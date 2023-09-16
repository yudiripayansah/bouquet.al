<?php

/*
   Class: FiorelloMikadoUserField
   A class that initializes FiorelloMikado User Field
*/

class FiorelloMikadoUserField implements iFiorelloMikadoRender {
	private $type;
	private $name;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	
	function __construct( $type, $name, $label = "", $description = "", $options = array(), $args = array() ) {
		$this->type        = $type;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$this->options     = $options;
		$this->args        = $args;
		add_filter( 'fiorello_mikado_filter_user_fields', array( $this, 'addFieldForEditSave' ) );
	}
	
	public function addFieldForEditSave( $names ) {
		
		$names[] = $this->name;
		
		return $names;
	}
	
	public function render( $factory ) {
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args );
	}
}

abstract class FiorelloMikadoUserFieldType {
	abstract public function render( $name, $label = "", $description = "", $options = array(), $args = array() );
}

class FiorelloMikadoUserFieldText extends FiorelloMikadoUserFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array() ) {
		
		$value = get_user_meta( $_GET['user_id'], $name, true );
		?>
		<tr>
			<th>
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
			</th>
			<td>
				<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ) ? esc_attr( $value ) : ''; ?>" class="regular-text">
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</td>
		</tr>
		<?php
	}
}

class FiorelloMikadoUserFieldSelect extends FiorelloMikadoTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array() ) {
		$selected_value = get_user_meta( $_GET['user_id'], $name, true ); ?>
			<tr>
				<th>
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>">
						<option <?php if ( $selected_value == "" ) { echo "selected='selected'"; } ?> value=""></option>
						<?php foreach ( $options as $key => $value ) {
							if ( $key == "-1" ) {
								$key = "";
							} ?>
							<option <?php if ( $selected_value == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
		<?php
	}
}

class FiorelloMikadoUserFieldImage extends FiorelloMikadoUserFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array() ) {

		$value = get_user_meta( $_GET['user_id'], $name, true );
		?>
        <tr>
            <th>
                <label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
                <p class="description"><?php echo esc_html( $description ); ?></p>
            </th>
            <td class="mkdf-user-image-field">
                <input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="mkdf-user-custom-media-url" value="<?php echo esc_attr($value)?>">
                <div class="mkdf-user-image-wrapper">
					<?php if ( $value ) { ?>
						<?php echo wp_get_attachment_image( $value, 'thumbnail' ); ?>
					<?php } ?>
                </div>
                <p>
                    <input type="button" class="button button-secondary mkdf-user-media-add" name="mkdf-user-media-add" value="<?php esc_attr_e( 'Add Image', 'fiorello' ); ?>"/>
                    <input data-userid="<?php echo esc_attr( $_GET['user_id'] ); ?>" type="button" class="button button-secondary mkdf-user-media-remove" name="mkdf-user-media-remove" value="<?php esc_attr_e( 'Remove Image', 'fiorello' ); ?>"/>
                </p>
            </td>
        </tr>
		<?php
	}
}

/*
   Class: FiorelloMikadoUserGroup
   A class that initializes Mikado User Group
*/
class FiorelloMikadoUserGroup implements iFiorelloMikadoLayoutNode, iFiorelloMikadoRender {
	public $children;
	public $title;
	public $description;

	function __construct($title_label="",$description="") {
		$this->children = array();
		$this->title = $title_label;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) { ?>
		<h2><?php echo esc_html($this->title); ?></h2>
		<table class="form-table">
			<tbody>
				<?php foreach ($this->children as $child) {
					$this->renderChild($child, $factory);
				} ?>
			</tbody>
		</table>
	<?php
	}

	public function renderChild(iFiorelloMikadoRender $child, $factory) {
		$child->render($factory);
	}
}

class FiorelloMikadoUserFieldFactory {
	public function render( $field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {

		switch ( strtolower( $field_type ) ) {
			case 'text':
				$field = new FiorelloMikadoUserFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'select':
				$field = new FiorelloMikadoUserFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'image':
				$field = new FiorelloMikadoUserFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			default:
				break;
		}
	}
}
