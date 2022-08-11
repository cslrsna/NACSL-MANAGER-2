<?php
namespace NACSL\Controllers;

use NACSL\Services\CptMeetingsService;
use NACSL\Services\Interfaces\ICptService;

/**
 * Custom post type controller for the Area service committees meetings.
 * @package NACSL\Controllers
 */
class CptMeetings extends CustomPostType
{
    private array $taxSubmenuOptions = array();
    private CptMeetingsService $_meetingsServ;

    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
        $this->_meetingsServ = new CptMeetingsService();
    }

    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        parent::Unregister();
        foreach ($this->taxSubmenuOptions['taxonomies'] as $tax) {
            unregister_setting($this->taxSubmenuOptions['option_group'], $tax['id']);
        }
    }

    public function AdminMenu(): void 
    {   
        $this->taxSubmenuOptions = $this->_meetingsServ->GetTaxOptions($this->slug);
        $this->_meetingsServ->GetTaxSubmenuOptions('admin/form/AdminOptionsForm.twig', $this->model );
        $this->_meetingsServ->ShowTaxSubmenuOptions($this->slug, $this->taxSubmenuOptions['fields']);
    }

    public function Options(): void
    {
        $this->_meetingsServ->TaxOptionsFactory($this->taxSubmenuOptions);
    }

    public function AdminHook(): void
    {
        parent::AdminHook();
        add_action('admin_menu', [$this, 'AdminMenu']);
        add_action('admin_init', [$this, 'Options']);
    }
}