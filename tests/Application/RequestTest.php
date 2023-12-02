<?php

namespace App\Tests\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestTest extends WebTestCase
{
/**
* @dataProvider elementPageProvider
*/
public function testPage($elementCount, $element): void
{
$client = static::createClient();
$userRepository = static::$container->get(UserRepository::class);
// извлечь из бд тестового пользователя
// рекомендуется использовать фикстуры
$testUser = $userRepository->findOneByEmail('john.doe@example.com');
// симулировать вход $testUser в систему
$client->loginUser($testUser);
$crawler = $client->request('GET'
,
'/task/create');
$this->assertResponseIsSuccessful();
//$this->assertSelectorExists("form"); // Проверка элемента на странице
// или проверка количества элементов на странице
$this->assertCount($elementCount, $crawler->filter($element));
}
public function elementPageProvider() {
return [
"form_test" => [1,
"form"],
"input_test" => [4,
"input"],
];
}

