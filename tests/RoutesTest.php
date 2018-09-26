<?php


class RoutesTest extends TestCase
{
    public function testClickUsers()
    {
        $this->visit('/')
            ->click('Пользователи')
            ->seePageIs('/users');
    }

    public function testClickAddUser()
    {
        $this->visit('/')
            ->click('Добавить пользователя')
            ->seePageIs('/add');
    }

    public function testClickAddTransaction()
    {
        $this->visit('/')
            ->click('Совершить транзакцию')
            ->seePageIs('/');
    }
}
