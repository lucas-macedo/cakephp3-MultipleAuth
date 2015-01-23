<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Likes Controller
 *
 * @property App\Model\Table\LikesTable $Likes
 */
class DashboardController extends AppController {

	public function home() {
	
		$this->set('likes',$this->Likes);
	}
}
