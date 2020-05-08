<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsersController extends AppController
{
     public function initialize(): void
    {
        parent::initialize();
        //$this->viewBuilder()->setLayout('beforeLogin');
        $this->set('title','DemoProject');
    }
    public function home()
    {
        $this->viewBuilder()->setLayout('afterLogin');
        if($this->request->is('post'))
        {
            $keyword=$this->request->getData('search');
            $this->set(compact('keyword'));
        }
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('afterLogin');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $session = $this->getRequest()->getSession();
        $id= $session->read('Auth.id');
        $this->viewBuilder()->setLayout('afterLogin');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('beforeLogin');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You are registered continue with login.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit()
    {
        $session = $this->getRequest()->getSession();
        $id= $session->read('Auth.id');
        $this->viewBuilder()->setLayout('afterLogin');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Profile updated.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function changePassword()
    {
        $this->viewBuilder()->setLayout('afterLogin');
        $session = $this->getRequest()->getSession();
        $id= $session->read('Auth.id');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currentpassword=$this->request->getData('currentpassword');

            if((new DefaultPasswordHasher())->check($currentpassword, $user->password))
            {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password Changed.'));

                    return $this->redirect(['action' => 'home']);
                }
            }
            else{
                $this->Flash->error(__('Old Password is incorrect.'));
                return $this->redirect(['action' => 'change-password']);
            }
            $this->Flash->error(__('Please, try again.'));
        }
        $this->set(compact('user'));
    }  

    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('beforeLogin');
        if ($this->request->is('post')) {
            $myemail = $this->request->getData('email');
            $mytoken=Security::hash(Security::randomBytes(25));

            $user=$this->Users->findByEmail($myemail)->first();
            if(isset($user))
            {
                $user->token=$mytoken;
                if ($this->Users->save($user)) {
                    $this->set(compact('myemail'));

                TransportFactory::setConfig('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => '49471287cb0491',
                    'password' => '5b42fc8d761261',
                    'className' => 'Smtp'
                ]);

                TransportFactory::setConfig('gmail', [
                    'host' => 'smtp.gmail.com',
                    'port' => 587,
                    'username' => 'ankrsi008@gmail.com',
                    'password' => '@2662663',
                    'className' => 'Smtp',
                    'tls' => true
                ]);
                    $mailer=new Mailer('default');
                    $mailer=$mailer->setTransport('mailtrap')
                            ->setEmailFormat('both')
                            ->setFrom(['ak7870854714@gmail.com'=>'Anand Kumar'])
                            ->setSubject('Please confirm your reset password:')
                            ->setTo($myemail);
                    $mailer->deliver('Hello '.$myemail.'<br>Please click link below to reset your password<br><br><br><a href="http://localhost:8765/users/reset-password/'.$mytoken.'">Reset Password</a>');
                }

                
            }
            else
            {
                $this->set('error','The email id is not registered with us. Please check them again.');
            }
              
        }
    }

    public function resetPassword($token)
    {
        $this->viewBuilder()->setLayout('beforeLogin');
        if ($this->request->is('post')) {
            $mypass=$this->request->getData('password');

            $user=$this->Users->find('all')->where(['token'=>$token])->first();
            if(isset($user))
            {
                $user->password=$mypass;
                $user->token='';
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password recovered.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            else
            {
                echo 'Link expired.';die;
            }
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('beforeLogin');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /users/home after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'home',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','add','forgotPassword','resetPassword']);
    }
}
