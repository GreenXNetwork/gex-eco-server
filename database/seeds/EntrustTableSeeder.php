<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator
        $administrator = new Role();
        $administrator->name         = 'administrator';
        $administrator->display_name = 'Administrator';
        $administrator->description  = 'Administrators of this project.';
        $administrator->save();

        // Partner
        $partner = new Role();
        $partner->name         = 'project-partner';
        $partner->display_name = 'Project Fund';
        $partner->description  = 'Updater of one or many energy projects';
        $partner->save();

        //Fund
        $fund = new Role();
        $fund->name = 'fund';
        $fund->display_name = 'Project Partner';
        $fund->description  = 'In charge of fund and dividend of projects';
        $fund->save();

        // Investor
        $investor = new Role();
        $investor->name         = 'investor';
        $investor->display_name = 'Investor';
        $investor->description  = 'Investors of energy projects.';
        $investor->save();

        // Administrator User
        $userAdmin = new \App\User();
        $userAdmin->name = 'Administrator';
        $userAdmin->email = 'admin@greenx.network';
        $userAdmin->password = bcrypt('12345678@xX');
        $userAdmin->confirmed = 1;
        $userAdmin->save();
        $userAdmin->attachRole($administrator);
        $userAdmin->attachRole($partner);
        $userAdmin->attachRole($fund);

        // Partner User
        $avatarnice = new \App\User();
        $avatarnice->name = 'VoDanh';
        $avatarnice->email = 'vodanh@gmail.com';
        $avatarnice->password = bcrypt('12345678@xX');
        $avatarnice->confirmed = 1;
        $avatarnice->save();
        $avatarnice->attachRole($partner);



        // Investor User
        $userInvestor1 = new \App\User();
        $userInvestor1->name = 'Investor 1';
        $userInvestor1->email = 'investor1@greenx.network';
        $userInvestor1->password = bcrypt('12345678@Ab');
        $userInvestor1->confirmed = 1;
        $userInvestor1->save();
        $userInvestor1->attachRole($investor);
        $userInvestor1->save();

        $userInvestor2 = new \App\User();
        $userInvestor2->name = 'Investor 2';
        $userInvestor2->email = 'investor2@greenx.network';
        $userInvestor2->password = bcrypt('12345678@Ab');
        $userInvestor2->confirmed = 1;
        $userInvestor2->save();
        $userInvestor2->attachRole($investor);
        $userInvestor2->save();

        $userInvestor3 = new \App\User();
        $userInvestor3->name = 'Investor 3';
        $userInvestor3->email = 'investor3@greenx.network';
        $userInvestor3->password = bcrypt('12345678@Ab');
        $userInvestor3->confirmed = 1;
        $userInvestor3->save();
        $userInvestor3->attachRole($investor);
    }
}
