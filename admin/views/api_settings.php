<?php
/** @var $arrayKeys wp-content\plugin\Lovat\lovat-admin\lovat_settings_page */
/** @var $arrayCountries wp-content\plugin\Lovat\lovat-admin\lovat_settings_page */
/** @var $issetCountry wp-content\plugin\Lovat\lovat-admin\lovat_settings_page */
?>

<div id="wrap-lovat">
	<?php if (!is_null(self::show_warning_message($user->ID))): ?>
		<?php echo self::show_warning_message() ?>
	<?php endif; ?>
	<?php if (!is_null(self::show_success_message())): ?>
		<?php echo self::show_success_message() ?>
	<?php endif; ?>
	<?php if (!is_null(self::show_error_message())): ?>
		<?php echo self::show_error_message() ?>
	<?php endif; ?>
    <div class="button-generate">
        <form name="save_settings" method="post">
            <button name="generate-key" class="button-primary admin-generate-key-button" type="submit"
                    value="<?php esc_attr_e('Generate key', 'lovat'); ?>"><?php esc_html_e('Generate key', 'lovat'); ?></button>
        </form>
    </div>

    <div class="departure-address lovat-white-block">
        Please select departure country
        <form name="save-lovat-departure-country" method="post">
            <label>
                <select class="departure-select-country" name="departure-select-country">
                    <option value="" selected disabled hidden>Select departure country</option>
					<?php foreach ($arrayCountries as $key => $countries): ?>
						<?php if ($issetCountry == $key): ?>
                            <option value="<?php echo $key ?>" selected><?php echo $countries ?></option>
						<?php else: ?>
                            <option value="<?php echo $key ?>"><?php echo $countries ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
                </select>
            </label>
            <br>
            <input type="submit" class="button-primary lovat-generate-departure-country" name="save-departure-country"
                   value="Сохранить">
        </form>
    </div>

    <div class="table-data-keys lovat-data-table lovat-white-block">
        <table id="lovat-api-generated-keys" class="display">
            <thead>
            <tr>
                <th>User ID</th>
                <th>Key</th>
                <th>Key creation date</th>
            </tr>
            </thead>
			<?php if (!empty($arrayKeys)): ?>
            <tbody>
			<?php foreach ($arrayKeys as $data): ?>
                <tr>
                    <td><?php echo $data->user_id ?></td>
                    <td><?php echo $data->token ?></td>
                    <td><?php echo $data->created ?></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
		<?php else: ?>
            <h4>Currently, not a single Bearer Token key was created. To obtain
			Lovat Api request key, please, press the button "Generate key".</h4>
		<?php endif; ?>
    </div>
</div>

