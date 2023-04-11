<?php

class adminController extends Controller
{
    private $currentUser;
    private $categoryImageHander;
    private $adminModel;
    private $categoryModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::ADMIN)) {
            $this->redirect('/error/dontHaveAccess');
        }
        $this->categoryImageHander = new ImageHandler($folder = 'Uploads/categories');

        $this->adminModel = $this->model('admin');
        $this->categoryModel = $this->model('category');
    }

    public function index()
    {
        $props = [];

        $activeUserCount = $this->adminModel->getActiveUserCount();
        if ($activeUserCount['success']) {
            $props['activeUserCount'] = $activeUserCount['data']['activeUserCount'];
        } else {
            $props['activeUserCount'] = 0;
        }

        $userCount = $this->adminModel->getUserCount();
        if ($userCount['success']) {
            $props['userCount'] = $userCount['data']['userCount'];
        } else {
            $props['userCount'] = 0;
        }

        $activeCategoriesCount = $this->categoryModel->getActiveCategoriesCount();
        if ($activeCategoriesCount['success']) {
            $props['activeCategoriesCount'] = $activeCategoriesCount['data']['activeCategoriesCount'];
        } else {
            $props['activeCategoriesCount'] = 0;
        }

        $this->set($props);
        $this->render('index');
    }

    public function users()
    {
        $props = [];

        $activeUsers = $this->adminModel->fetchAllActiveUsers();
        if ($activeUsers['success']) {
            $props['activeUsers'] = $activeUsers['data'];
        }

        $suspendedUsers = $this->adminModel->fetchAllSuspendedUsers();
        if ($suspendedUsers['success']) {
            $props['suspendedUsers'] = $suspendedUsers['data'];
        }

        $this->set($props);
        $this->render('users');
    }

    public function suspend_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $suspendUser = new Input(POST, 'suspend-confirm');
            $response = $this->adminModel->suspendUser($suspendUser);
            if ($response['success']) {
                $this->redirect('/admin/users');
            } else {
                $this->redirect('/error/500');
            }
        }
    }

    public function reactivate_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reactiveUser = new Input(POST, 'reactivate-confirm');
            $response = $this->adminModel->reactivateUser($reactiveUser);
            if ($response['success']) {
                $this->redirect('/admin/users');
            } else {
                $this->redirect('/error/500');
            }
        }
    }

    public function investments()
    {
        $this->render('investments');
    }

    public function newCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cid = new UID(PREFIX::CATEGORY);
            try {
                $image = $this->categoryImageHander->upload('thumbnail');
                $data = [
                    'id' => $cid,
                    'name' => new Input(POST, 'name'),
                    'slug' => new Input(POST, 'slug'),
                    'type' => new Input(POST, 'type'),
                    'thumbnail' => $image[0],
                    'createdBy' => $this->currentUser->getUid()
                ];

                $res = $this->categoryModel->createCategory($data);
                if ($res['success']) {
                    $this->redirect('/admin/categories');
                } else {
                    $this->redirect('/admin/categories/error');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->redirect('/admin/categories/error');
            }
        }
    }

    public function delete_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cid = new Input(POST, 'cid-confirm');
            $response = $this->categoryModel->deleteCategory($cid);
            if ($response['success']) {
                $this->redirect('/admin/categories');
            } else {
                $this->redirect('/admin/categories/error');
            }
        }
    }


    public function update_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cid = new Input(POST, 'u-submitBtn');
            $image = $this->categoryImageHander->upload('u-thumbnail');
            if (isset($image)) {
                $res = $this->categoryModel->updateCategoryImage($cid, $image[0]);
                if ($res['success']) {
                    $this->redirect('/admin/categories');
                } else {
                    die(var_dump($res));
                    $this->redirect('/admin/categories/error');
                }
            }

            $data = [
                'name' => new Input(POST, 'u-name'),
                'slug' => new Input(POST, 'u-slug'),
                'type' => new Input(POST, 'u-type'),
                'cid' => $cid,
            ];

            $res = $this->categoryModel->updateCategory($data);
            if ($res['success']) {
                $this->redirect('/admin/categories');
            } else {
                die(var_dump($res));
                $this->redirect('/admin/categories/error');
            }





            // $response = $this->categoryModel->updateCategory($cid, $data);
            // if ($response['success']) {
            //     $this->redirect('/admin/categories');
            // } else {
            //     $this->redirect('/admin/categories/error');
            // }
        }
    }

    public function categories()
    {
        $props = [];
        $subCategories = $this->categoryModel->fetchAllCategories();
        if ($subCategories['success']) {
            $props['subCategories'] = $subCategories['data'];
        }

        $this->set($props);
        $this->render('categories');
    }

    public function complains()
    {
        $this->render('complains');
    }

    public function help()
    {
        $this->render('helpCenter');
    }
}
