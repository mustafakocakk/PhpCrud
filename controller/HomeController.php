<?php


class HomeController extends GeneralController
{
public  function welcome()
    {
        $persons = new Service();
        $persons = $persons->getUsers();
        echo $this->twig->render('anasayfa.twig', array(
            'persons' => $persons,
        ));


    }

    public function insert()
    {
        $eleman = new data();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty(!$_POST['lastname'])) {
            $eleman->fname = $_POST['firstname'];
            $eleman->lname = $fname = $_POST['lastname'];
            $insertPerson = new Service();
            $insertPerson = $insertPerson->insertUser($eleman);
            return $this->welcome();
        }
    }

    public function getUser()
    {
        $persons = new Service();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty(!$_POST['id'])) {

            $eleman = $persons->getUser($_POST['id']);
        }
        echo $this->twig->render('update.twig', array(
            'persons' => $eleman,
        ));


    }
    public function  updateUser()
    { $persons = new Service();
        $eleman=new data();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty(!$_POST['lastname']))
        {
               if($_POST['secim']=='evet')
                    {$eleman->u_id=$_POST['id'];
                        $persons->deleteUser($eleman->u_id);
                    }

               else if($_POST['secim']!="evet")
                    {var_dump($_POST['secim'!='evet']);
                   return $this->welcome();
                    }
               else
                    {
                     $eleman->u_id=$_POST['id'];
                     $eleman->fname=$_POST['firstname'];
                     $eleman->lname=$_POST['lastname'];
                     $persons->updateUser($eleman);
                    }
                return $this->welcome();
        }
    }
}