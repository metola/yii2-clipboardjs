<?php

namespace metola\ClipboardJs;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

class ClipboardJsWidget extends Widget
{
	/**
	 * The text to copy
	 * @var string
	 */
	public $text;

	/**
	 * Input to copy/cut text from "#input-id-23"
	 * @var string
	 */
	public $inputId;

	/**
	 * Button Label
	 * @var string
	 */
	public $label = 'Copy to clipboard';

	public $successText = 'Copied';

	/**
	 * @var array
	 */
	public $htmlOptions = ['class' => 'btn'];

	/**
	 * Cut the text from the input id
	 * @var bool
	 */
	public $cut = false;

	/**
	 * Element tag
	 * @var string
	 */
	public $tag = 'button';

	public function init()
	{
		if(!isset($this->text) && !isset($this->inputId)) {
			throw new InvalidConfigException('"text" or "inputId" must be set for the ClipboardJsWidget.');
		}
		if(isset($this->inputId) && substr($this->inputId, 0, 1) !== '#') {
			//Don't worry about if you put in that # tag.
			$this->inputId = '#'.$this->inputId;
		}
		parent::init();
		ClipboardJsAsset::register($this->getView());
	}

	public function run()
	{
		$options = $this->htmlOptions;
		$options['data']['clipboard-action'] = 'copy';
		if(isset($this->text)) {
			$options['data']['clipboard-text'] = $this->text;
		} elseif(isset($this->inputId)) {
			$options['data']['clipboard-target'] = $this->inputId;
			if($this->cut) {
				$options['data']['clipboard-action'] = 'cut';
			}
		}
		if($this->successText) {
			$options['data']['clipboard-success'] = $this->successText;
		}
		Html::addCssClass($options, 'clipboard-js-init');

		echo Html::tag($this->tag, $this->label, $options);
	}
}
