<?php namespace Domain\UX\Controllers;

use BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Application as Laravel;
/**
 * Class UXController
 * @package Domain\UX\Controllers
 */
class UXController extends BaseController
{
    /**
     * Construct
     */
    public function __construct(Laravel $app)
    {
	      parent::__construct($app);
    }

    /**
     * Index
     *
     * @return View
     */
    public function index()
    {
        $page_title = 'Domain UX';
        $values = [
          'title' => $page_title
        ];
        return View::make('ux::default.index', $values);
    }

}
