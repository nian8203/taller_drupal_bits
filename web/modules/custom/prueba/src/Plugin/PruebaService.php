<?php

namespace Drupal\prueba\Plugin;
use Drupal\Core\Session\AccountProxy;
use Drupal\node\Entity\Node;


class PruebaService {

    private $sounds = ['looO','mooO','uuuU'];
    private $currentUser;

    // public function __construct($currentUser){
    //     $this->currentUser = $currentUser;

    // }

    public function saySomething(){
        return $this->sounds[array_rand($this->sounds)];
    }

    // public function sessionUser(){
    //     kint($this->currentUser);
    //     // return $this->currentUser->getDisplayName();
    // } 

   

    public function dataForm(){

        // $form = \Drupal::formBuilder()->getForm('\Drupal\prueba\Form\PruebaForm');
        // return $form['prueba_thing'];


        $f = \Drupal::config('prueba.settings')->getRawData();
        $a = $f['prueba_thing'];
        return $a;

        // $mailerSetting = \Drupal::config('prueba_admin_settings')->getRawData();
        // $response = $mailerSetting['prueba_thing'];

        


    }

    public function dataNode(){

        //$cont = array();
        $cont=[1,2];
        $nodes = \Drupal\node\Entity\Node::loadMultiple($cont);
        //$nodes = Node::multiLoad($cont);
        foreach($nodes as $node){
            $response[]=[
                $node->get('field_nombre')->value,
                $node->get('field_apellido')->value,
                $node->get('field_edad')->value,

            ];
        }

        //$n = Node::load(2); // 1 = numero de nodo al cual se desea acceder
        //dpm($n->get('field_nombre')->getValue()[0]['value']); //forma larga
        // return $n->get('field_nombre')->value;

        return $response;


    }



}