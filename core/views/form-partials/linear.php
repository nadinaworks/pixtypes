<?php defined('ABSPATH') or die;
	/* @var PixtypesForm $form */
	/* @var PixtypesMeta $conf */

	$f = &$form;
?>

<?php foreach ($conf->get('fields', array()) as $fieldname): ?>

	<?php echo $f->field($fieldname)
		->addmeta('special_sekrit_property', '!!')
		->render() ?>

<?php endforeach; ?>
