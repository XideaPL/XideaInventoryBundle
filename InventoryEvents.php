<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
final class InventoryEvents
{
    /**
     * The PRE_SAVE event occurs when the inventory is saved.
     */
    const ITEM_PRE_SAVE = 'xidea_inventory.inventory.item_pre_save';
    
    /**
     * The POST_SAVE event occurs when the inventory is saved.
     */
    const ITEM_POST_SAVE = 'xidea_inventory.inventory.item_post_save';
    
    /**
     * The CREATE_INITIALIZE event occurs when the create process is initialized.
     */
    const CREATE_INITIALIZE = 'xidea_inventory.inventory.create_initialize';
    
    /**
     * The PRE_CREATE event occurs when the create process is initialized.
     */
    const PRE_CREATE = 'xidea_inventory.inventory.pre_create';
    
    /**
     * The CREATE_SUCCESS event occurs when the create process is initialized.
     */
    const CREATE_SUCCESS = 'xidea_inventory.inventory.create_success';
    
    /**
     * The CREATE_FORM_VALID event occurs when the create process is initialized.
     */
    const CREATE_FORM_VALID = 'xidea_inventory.inventory.create_form_valid';
    
    /**
     * The CREATE_COMPLETED event occurs when the create process is initialized.
     */
    const CREATE_COMPLETED = 'xidea_inventory.inventory.create_completed';
    
}
