<?php

namespace common\components;

use yii\db\ActiveRecord;

/**
 * Our base active record
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class GActiveRecord extends ActiveRecord
{
	CONST NOT_AVA = 'Not Available';
	CONST NOT_AVA_ABBR = 'N/A';
	const ACTIVE_STATUS  = 1;
    const IN_ACTIVE_STATUS  = 0;
	/**
	* Returns list of common item values of application
	* Note : Use 'c' prefix before item name to denote a common attribute
	*
	* @return array
	*/
	public static function getActiveData()
	{
		return (
			[
				'cResponse' => ['No', 'Yes'],
				'cStatus' 	=> ['Disabled', 'Enabled'],	
			]
		);
	}

	/**
	* Returns list of common item values of application against an item name.
	*
	* @return array if not found `string`
	*/
	public static function getActiveDataItem($itemName)
	{
		$dataItems = self::getActiveData();
		return (isset($dataItems[$itemName]) ? $dataItems[$itemName] : self::NOT_AVA_ABBR);
	} 
}
