<?php
/*********************************************************************************
 * X2Engine is a contact management program developed by
 * X2Engine, Inc. Copyright (C) 2011 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2Engine, X2Engine DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. at P.O. Box 66752,
 * Scotts Valley, CA 95067, USA. or at email address contact@X2Engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 ********************************************************************************/

Yii::import('zii.widgets.CWidget');

class InlineEmailForm extends CWidget {
	public $to;
	public $subject;
	public $message;
	public $redirectId;
	public $redirectType;

	public $errors = array();
	public $startHidden = false;

	public function init() {
	
		
		Yii::app()->clientScript->registerScript('toggleEmailForm',
			($this->startHidden? "$(document).ready(function() { $('#email-form').hide(); });\n" : '')
			. "function toggleEmailForm() {
				$('#email-form').toggle('blind',300,function() {
					$('#email-form #email-subject').focus();
				});
			}
			",CClientScript::POS_HEAD);
		parent::init();
	}

	public function run() {
		// $actionModel = new ActionChild;
		// $actionModel->associationType = $this->associationType;
		// $actionModel->associationId = $this->associationId;
		// $actionModel->assignedTo = $this->assignedTo;
		echo $this->render('emailForm',array(
			'to'=>$this->to,
			'subject'=>$this->subject,
			'message'=>$this->message,
			'redirectId'=>$this->redirectId,
			'redirectType'=>$this->redirectType,
			'errors'=>$this->errors
		));	//, array('actionModel'=>$actionModel,'users'=>$this->users,'inlineForm'=>true)
	}
}
?>