<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliverymanPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert(array(
            0 =>
            array('id' => '142', 'name' => 'add_deliveryman', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '143', 'name' => 'edit_deliveryman', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '144', 'name' => 'assign_deliveryman', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '145', 'name' => 'delete_deliveryman', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '146', 'name' => 'deliveryman_config', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '147', 'name' => 'deliveryman_list', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '148', 'name' => 'deliveryman_cancel_request', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '149', 'name' => 'deliveryman_payment_history', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '150', 'name' => 'deliveryman_payroll_create', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '151', 'name' => 'deliveryman_payroll_list', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
            array('id' => '152', 'name' => 'deliveryman_payroll_edit', 'group_name' => 'deliveryman', 'guard_name' => 'web'),
        ));
    }
}
