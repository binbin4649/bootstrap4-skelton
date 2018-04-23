<?php
/**
 * メールフォーム入力欄
 * 呼出箇所：メールフォーム入力ページ、メールフォーム入力内容確認ページ
 *
 * @var int $blockStart 表示するフィールドの開始NO
 * @var int $blockEnd 表示するフィールドの終了NO
 * @var bool $freezed 確認画面かどうか
 */
$group_field = null;
$iteration = 0;
if (!isset($blockEnd)) {
	$blockEnd = 0;
}

if (!empty($mailFields)) {

	foreach ($mailFields as $key => $record) {

		$field = $record['MailField'];
		$iteration++;
		if ($field['use_field'] && ($blockStart && $iteration >= $blockStart) && (!$blockEnd || $iteration <= $blockEnd)) {

			$next_key = $key + 1;
			$description = $field['description'];

			/* 項目名 */
			if ($group_field != $field['group_field'] || (!$group_field && !$field['group_field'])) {
				echo '    <div class="row form-group" id="RowMessage' . Inflector::camelize($record['MailField']['field_name']) . '"';
				if ($field['type'] == 'hidden') {
					echo ' style="display:none"';
				}
				echo '>' . "\n" . '        <div class="col-md-4 text-md-right">' . $this->Mailform->label("MailMessage." . $field['field_name'] . "", $field['head']);
				if ($field['not_empty']) {
					echo '<small><span class="text-danger">' . __('必須') . '</span></small>';
				} else {
					echo '<small><span class="normal">' . __('任意') . '</span></small>';
				}
				echo '</div>' . "\n" . '        <div class="col-md-8">';
			}
			
			// group_fieldをrowで囲う
			if($field['options'] == 'group_inline'){
				if(!empty($field['group_field']) && $group_field != $field['group_field'] ){
					echo '<div class="row"><div class="col">';
				}
				if(!empty($field['group_field']) && $group_field == $field['group_field'] ){
					echo '<div class="col">';
				}
			}
			
			echo '<span id="FieldMessage' . Inflector::camelize($record['MailField']['field_name']) . '">';
			if (!$freezed && $description) {
				echo '<span class="mail-description">' . $description . '</span>';
			}
			/* 入力欄 */
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<div class="form-inline"><label class="mr-1">' . $field['before_attachment'] . '</label>';
			}
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<div class="form-inline">';
			}
			// =========================================================================================================
			// 2018/02/06 ryuring
			// no_send オプションは、確認画面に表示しないようにするために利用されている可能性が高い
			//（メールアドレスのダブル入力、プライバシーポリシーへの同意に利用されている）
			// 本来であれば、not_display_confirm 等のオプションを別途準備し、そちらを利用するべきだが、
			// 後方互換のため残す
			// =========================================================================================================
			// bootstrap用にclass書き換え
			if(empty($record["MailField"]['class'])){
				$record["MailField"]['class'] = 'form-control';
			}
			
			if ($freezed && $field['no_send']) {
				echo $this->Mailform->control('hidden', "MailMessage." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $this->Mailfield->getAttributes($record));
			} else {
				echo $this->Mailform->control($field['type'], "MailMessage." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $this->Mailfield->getAttributes($record));
			}
			
			//閉じタグ追加 before_attachment 　あるかどうか
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '</div>';
			}
			
/*
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<span class="mail-after-attachment">' . $field['after_attachment'] . '</span>';
			}
*/
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<label class="mx-auto">' . $field['after_attachment'] . '</label></div>';
			}
			if (!$freezed) {
				echo '<span class="mail-attention">' . $field['attention'] . '</span>';
			}
			if (!$field['group_valid']) {
				echo $this->Mailform->error("MailMessage." . $field['field_name']);
			}
			
			/* 説明欄 */
			if (($this->BcArray->last($mailFields, $key)) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field']) ||
				(!$field['group_field'] && !$mailFields[$next_key]['MailField']['group_field']) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field'] && $this->BcArray->first($mailFields, $key))) {

				if ($field['group_valid']) {
					echo $this->Mailform->error("MailMessage." . $field['group_field'] . "_not_same", __("入力データが一致していません。"));
					echo $this->Mailform->error("MailMessage." . $field['group_field'] . "_not_complate", __("入力データが不完全です。"));

					if (!$this->Mailform->error("MailMessage." . $field['group_field'] . "_not_same")
						&& !$this->Mailform->error("MailMessage." . $field['group_field'] . "_not_complate")) {
						$groupValidErrors = $this->Mailform->getGroupValidErrors($mailFields, $field['group_valid']);
						if ($groupValidErrors) {
							foreach ($groupValidErrors as $groupValidError) {
								echo $groupValidError;
							}
						} else {
							echo $this->Mailform->error("MailMessage." . $field['group_field'], __("必須項目です。"));
						}
					}
				}

				echo '</span>';
				echo "</div>\n    </div>\n";
			} else {
				echo '</span>';
			}
			
			// group_fieldをrowで囲う 閉じ
			if($field['options'] == 'group_inline'){
				if(!empty($field['group_field']) && $group_field != $field['group_field'] ){
					echo '</div>';
				}
				if(!empty($field['group_field']) && $group_field == $field['group_field'] ){
					echo '</div>';
				}
				if(!empty($mailFields[$next_key]['MailField']['group_field'])){
					$next_group_field = $mailFields[$next_key]['MailField']['group_field'];
				}else{
					$next_group_field = '';
				}
				if(!empty($field['group_field']) && $next_group_field != $field['group_field'] ){
					echo '</div>';
				}
			}
			
			$group_field = $field['group_field'];
		}
	}
}