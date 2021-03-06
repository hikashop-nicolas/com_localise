<?php
/**
 * @package     Com_Localise
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Controller class for the localise component
 *
 * @package     Extensions.Components
 * @subpackage  Localise
 */
class LocaliseController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/localise.php';

		$vName = $this->input->get('view', 'languages');

		if ($vName == 'translations')
		{
			$view     = $this->getView('translations', 'html');
			$packages = $this->getModel('Packages', 'LocaliseModel', array('ignore_request' => true));
			$view->setModel($packages);
		}
		else
		{
			$this->input->set('view', $vName);
		}

		parent::display($cachable, $urlparams);
	}
}
