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
final class StockEvents
{
    /**
     * The PRE_SAVE event occurs when the stock is saved.
     */
    const PRE_SAVE = 'xidea_stock.stock.pre_save';
    
    /**
     * The POST_SAVE event occurs when the stock is saved.
     */
    const POST_SAVE = 'xidea_stock.stock.post_save';
    
    /**
     * The CREATE_INITIALIZE event occurs when the create process is initialized.
     */
    const CREATE_INITIALIZE = 'xidea_stock.stock.create_initialize';
    
    /**
     * The PRE_CREATE event occurs when the create process is initialized.
     */
    const PRE_CREATE = 'xidea_stock.stock.pre_create';
    
    /**
     * The CREATE_SUCCESS event occurs when the create process is initialized.
     */
    const CREATE_SUCCESS = 'xidea_stock.stock.create_success';
    
    /**
     * The CREATE_FORM_VALID event occurs when the create process is initialized.
     */
    const CREATE_FORM_VALID = 'xidea_stock.stock.create_form_valid';
    
    /**
     * The CREATE_COMPLETED event occurs when the create process is initialized.
     */
    const CREATE_COMPLETED = 'xidea_stock.stock.create_completed';
    
}
