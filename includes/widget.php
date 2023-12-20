<?php
// phpcs:ignoreFile
namespace SKTPRAC;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget extends \WP_Widget {

    public function __construct() {
        add_action( 'widgets_init', [ $this, 'register_form_widget' ]  );
        parent::__construct( 'form_widget', 'Form Widget' );
    }

    public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div>',
	);

    public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        echo '<div class="textwidget">';
		echo esc_html( $instance['amount'] );
		echo '</div>';

        echo '<div class="textwidget">';
		echo esc_html( $instance['buyer'] );
		echo '</div>';
        
        echo '<div class="textwidget">';
		echo esc_html( $instance['receipt_id'] );
		echo '</div>';

        echo '<div class="textwidget">';
		echo esc_html( $instance['items'] );
		echo '</div>';

        echo '<div class="textwidget">';
		echo esc_html( $instance['email'] );
		echo '</div>';
        
        echo '<div class="textwidget">';
		echo esc_html( $instance['note'] );
		echo '</div>';
        
        echo '<div class="textwidget">';
		echo esc_html( $instance['city'] );
		echo '</div>';
        
        echo '<div class="textwidget">';
		echo esc_html( $instance['phone'] );
		echo '</div>';
        
        echo '<div class="textwidget">';
		echo esc_html( $instance['entry_by'] );
		echo '</div>';

        

		echo $args['after_widget'];
	}

    public function form( $instance ) {
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'skt' );
		$amount      = ! empty( $instance['amount'] ) ? $instance['amount'] : esc_html__( '', 'skt' );
		$buyer       = ! empty( $instance['buyer'] ) ? $instance['buyer'] : esc_html__( '', 'skt' );
		$receipt_id  = ! empty( $instance['receipt_id'] ) ? $instance['receipt_id'] : esc_html__( '', 'skt' );
		$items       = ! empty( $instance['items'] ) ? $instance['items'] : esc_html__( '', 'skt' );
		$email       = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( '', 'skt' );
		$note        = ! empty( $instance['note'] ) ? $instance['note'] : esc_html__( '', 'skt' );
		$city        = ! empty( $instance['city'] ) ? $instance['city'] : esc_html__( '', 'skt' );
		$phone       = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( '', 'skt' );
		$entry_by    = ! empty( $instance['entry_by'] ) ? $instance['entry_by'] : esc_html__( '', 'skt' );
		?>

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'title:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"><?php echo esc_html__( 'Amount:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="number" value="<?php echo esc_attr( $amount ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'buyer' ) ); ?>"><?php echo esc_html__( 'Buyer:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'buyer' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'buyer' ) ); ?>" type="text" value="<?php echo esc_attr( $buyer ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'receipt_id' ) ); ?>"><?php echo esc_html__( 'Receipt_id:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'receipt_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'receipt_id' ) ); ?>" type="text" value="<?php echo esc_attr( $receipt_id ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"><?php echo esc_html__( 'Items:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>" type="text" value="<?php echo esc_attr( $items ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php echo esc_html__( 'Email:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email" value="<?php echo esc_attr( $email ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'note' ) ); ?>"><?php echo esc_html__( 'note:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'note' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'note' ) ); ?>" type="text" value="<?php echo esc_attr( $note ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'city' ) ); ?>"><?php echo esc_html__( 'city:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'city' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'city' ) ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php echo esc_html__( 'phone:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="number" value="<?php echo esc_attr( $phone ); ?>">
		</p>
        
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'entry_by' ) ); ?>"><?php echo esc_html__( 'entry_by:', 'skt' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'entry_by' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'entry_by' ) ); ?>" type="number" value="<?php echo esc_attr( $entry_by ); ?>">
		</p>
		
		<?php
	}

    public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['amount']      = ( ! empty( $new_instance['amount'] ) ) ? strip_tags( $new_instance['amount'] ) : '';
		$instance['buyer']       = ( ! empty( $new_instance['buyer'] ) ) ? strip_tags( $new_instance['buyer'] ) : '';
		$instance['receipt_id']  = ( ! empty( $new_instance['receipt_id'] ) ) ? strip_tags( $new_instance['receipt_id'] ) : '';
		$instance['items']       = ( ! empty( $new_instance['items'] ) ) ? strip_tags( $new_instance['items'] ) : '';
		$instance['email']       = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['note']        = ( ! empty( $new_instance['note'] ) ) ? strip_tags( $new_instance['note'] ) : '';
		$instance['city']        = ( ! empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
		$instance['phone']       = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['entry_by']    = ( ! empty( $new_instance['entry_by'] ) ) ? strip_tags( $new_instance['entry_by'] ) : '';
		return $instance;
	}

    public function register_form_widget() {
        register_widget( 'SKTPRAC\Widget' );
    } 


}