<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testCreateTask()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/task/create');

        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    
        $formData = [
            'task_type' => 'Task Type',
            'task_description' => 'Task Description',
            
        ];

        $client->submitForm('Create', $formData);

        
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

}