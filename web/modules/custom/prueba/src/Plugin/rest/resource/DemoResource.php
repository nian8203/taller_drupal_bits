<?php

namespace Drupal\prueba\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\node\Entity\Node;


/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "demo_resource",
 *   label = @Translation("Demo Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/test"
 *   }
 * )
 */
class DemoResource extends ResourceBase {

    /**
     * Responds to entity GET requests.
     * @return \Drupal\rest\ResourceResponse
     */
    public function get() {

      // $response = ['message' => 'Hello, this is a rest service'];
      // return new ResourceResponse($response);

      //llamada form entrenamiento bits
      $f = \Drupal::config('prueba.settings')->getRawData();
      $a = $f['prueba_thing'];
      $ap['config'] = [
        'api_key' => $a,
      ];

      //llamada node colaboradores bits
      $cont=[1,2];
      $nodes = \Drupal\node\Entity\Node::loadMultiple($cont);
      //$nodes = Node::multiLoad($cont);
      foreach($nodes as $node){
          $response[]=[
              'name' => $node->get('field_nombre')->value,
              'last_name' => $node->get('field_apellido')->value,
              'age' => $node->get('field_edad')->value,

          ];
      }

      $data['data']=[$response, $ap];
      
      return new ResourceResponse($data);


      
    }
  }
  