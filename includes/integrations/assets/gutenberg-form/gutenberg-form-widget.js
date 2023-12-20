( function( wp, React, $ ) {

    const { data, blocks, serverSideRender: ServerSideRender } = wp;
    const { __ } = wp.i18n;
    const { registerBlockType } = blocks;
    const { withSelect } = data;

    // var interval, interval_count = 0;


    const BlockDisplay = function({ setAttributes, attributes, className }) {

        // let shortcodeID = attributes.shortcode;

        // function updateShortcodeID( event ) {

        //     setAttributes({
        //         shortcode: event.target.value
        //     });

        // }

        // function getShortcodeOptions() {
        //     return gs_logo_slider_block.shortcodes.map(function( item ) {
        //         return <option value={item.id} key={item.id}>{ item.shortcode_name }</option>
        //     });
        // }


        return <div className='gslogo--block'>

            

            <ServerSideRender className={className} block='sktprac/shortcode_form' attributes={ attributes } />

        </div>
    }

    // const Icon = function() {
    //     
    // }

    registerBlockType('sktprac/shortcode_form', {

        title: __( 'SKT Form', 'skt' ),
        description: __( 'Show Form Fields', 'skt' ),
        icon: '',
        category: 'layout',
        keywords: [ 'image', 'photo', 'pics' ],
        example: { attributes: {} },
        supports: {
            align: ['wide', 'full']
        },
        attributes: {
            
        },
        edit: withSelect( () => {} )( BlockDisplay )

    });

}( window.wp, window.React, jQuery ));