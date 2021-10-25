<?php

namespace Config;
use App\Models\ProdukSatuanModel;
use App\Models\EstimasiModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\UserModel;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Make Password
$routes->get('/testpass', 'Auth::testPass');

// Auth
$routes->get('login', 'Auth::login', ["as" => "login"], ["filter" => "noauth"]);
$routes->get('register', 'Auth::register', ["as" => "register"], ["filter" => "noauth"]);
$routes->get('logout', 'Auth::logout', ["as" => "logout"], ["filter" => "noauth"]);


// Main
$routes->get('/', 'Home::index', ["as" => "homeUser"]);

// Pesan
$routes->get('/pesan', function () {
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        return view('main_page/pages/pesan');
    }
});
$routes->get('/paket-kostan', function () {
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        return view('main_page/pages/paket-kost');
    }
});
$routes->get('/paket-standar', function () {
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        $product = new ProdukSatuanModel();
        $estimasi = new EstimasiModel;
        $data['product'] = $product->findAll();
        $data['estimasi'] = $estimasi->findAll();
        return view('main_page/pages/paket-standar', $data);
    }
});

// Ajax Product
$routes->post('/ajax/produk/satuan', function () {
    $req = $this->request->getVar('id');
    $product = new ProdukSatuanModel();
    $data = $product->where('id', $req)->first();
    echo json_encode($data);
});

$routes->add('transaction', 'Admin\TransactionController::createTransaction');
$routes->add('tansaction/success', function () {
    return view('main_page/pages/selesai_pesan');
});
$routes->get('/list/pesanan', function () {
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        $trx = new TransactionModel();
        $data['trx'] = $trx->where('user_id',session()->get('id'))->findAll();
        return view('main_page/pages/user/transaksi', $data);
    }
});
$routes->get('/my-profile', function () {
    $this->session = \Config\Services::session();
    
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        $user = new UserModel();
        $data['user'] = $user->where('id', session()->get('id'))->first();
        return view('main_page/pages/user/profile', $data);
    }
});
$routes->post('/my-profile/ubah/(:num)', function ($id) {
    $this->session = \Config\Services::session();
    
    if(!session()->has('isLogin')){
        return redirect()->to(base_url());
    } else {
        $user = new UserModel();
        $data['user'] = $user->where('id', $id)->first();

        $cek_email = $user->where('email',$this->request->getPost('email'))->first();
        
        if ($cek_email) {
            if ($data['user']['id'] == $cek_email['id']) {
                // echo 1;
                if ($this->request->getPost('password')) {
                    
                    $validation =  \Config\Services::validation();
        
                    $isDataValid = $validation->run($this->request->getPost(), 'register');
        
                    $errors = $validation->getErrors();
                    
                    if($errors){
                        session()->setFlashdata('error', $errors);
                        return view('main_page/pages/user/profile', $data);
                    }
                    
                    if($isDataValid){             
                        $salt = uniqid('', true);
                        $password = md5($this->request->getPost('password')).$salt;    
                    }
                    
                } else {
                    $salt = $data['user']['salt'];
                    $password = $data['user']['password'];   
                }
    
                // echo $password;
        
                $user->update($id, [
                    "name" => $this->request->getPost('name'),
                    "dob" => $this->request->getPost('dob'),
                    "gender" => $this->request->getPost('gender'),
                    "address" => $this->request->getPost('address'),
                    "email" => $this->request->getPost('email'),
                    "password" => $password,
                    "salt" => $salt
                ]);
                session()->setFlashdata('success', 'Berhasil edit data!');
                return redirect()->to(base_url('my-profile'));
    
            } else {
                session()->setFlashdata('email', 'Email telah digunakan!');
                return view('main_page/pages/user/profile', $data);
            }
        } else {
            if ($this->request->getPost('password')) {
                    
                $validation =  \Config\Services::validation();
    
                $isDataValid = $validation->run($this->request->getPost(), 'register');
    
                $errors = $validation->getErrors();
                
                if($errors){
                    session()->setFlashdata('error', $errors);
                    return view('main_page/pages/user/profile', $data);
                }
                
                if($isDataValid){             
                    $salt = uniqid('', true);
                    $password = md5($this->request->getPost('password')).$salt;    
                }
                
            } else {
                $salt = $data['user']['salt'];
                $password = $data['user']['password'];   
            }

            // echo $password;
    
            $user->update($id, [
                "name" => $this->request->getPost('name'),
                "dob" => $this->request->getPost('dob'),
                "gender" => $this->request->getPost('gender'),
                "address" => $this->request->getPost('address'),
                "email" => $this->request->getPost('email'),
                "password" => $password,
                "salt" => $salt
            ]);
            session()->setFlashdata('success', 'Berhasil edit data!');
            return redirect()->to(base_url('my-profile'));
        }
    }
});

$routes->post('/upload-bukti', function () {
    $trans = new TransactionModel();
    $dataBerkas = $this->request->getFile('bukti_tf');
    $fileName = $dataBerkas->getRandomName();

    $data['trans'] = $trans->where('id', $this->request->getPost('id'))->first();

    // return $this->request->getPost('id');

    $trans->update($this->request->getPost('id'),[
        'bukti_tf' => $fileName,
        'status' => "Sedang di Konfirmasi"
    ]);
    $dataBerkas->move('uploads/bukti/', $fileName);
    return redirect()->to(base_url('list/pesanan'));
});


// Dashboard
// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');

    $routes->group("master", function($routes) {

        // User
        $routes->group("user", function($routes) {
            $routes->get('/', 'Admin\UserController::index', ["as" => "userIndex"]);
            $routes->get('create', 'Admin\UserController::create', ["as" => "userCreate"]);
            $routes->post('store', 'Admin\UserController::store', ["as" => "userStore"]);
            $routes->get('edit/(:num)', 'Admin\UserController::edit/$1', ["as" => "userEdit"]);
            $routes->post('update/(:num)', 'Admin\UserController::update/$1', ["as" => "userUpdate"]);
            $routes->get('delete/(:num)', 'Admin\UserController::delete/$1', ["as" => "userDelete"]);
        });

    });
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
