( function( wp, React, $ ) {

    const { data, blocks, serverSideRender: ServerSideRender } = wp;
    const { __ } = wp.i18n;
    const { registerBlockType } = blocks;
    const { withSelect } = data;

    var interval, interval_count = 0;

    const BlockServerRenderScript = function() {

        if ( interval ) clearInterval( interval );

        interval_count = 0;

        interval = setInterval(function() {
            $(document).trigger( 'gslogo:scripts:reprocess' );
            if ( interval && interval_count > 100 ) clearInterval( interval );
            interval_count ++;
        }, 200);

    }

    const BlockDisplay = function({ setAttributes, attributes, className }) {

        let shortcodeID = attributes.shortcode;

        function updateShortcodeID( event ) {

            setAttributes({
                shortcode: event.target.value
            });

        }

        function getShortcodeOptions() {
            return gs_logo_slider_block.shortcodes.map(function( item ) {
                return <option value={item.id} key={item.id}>{ item.shortcode_name }</option>
            });
        }

        BlockServerRenderScript();

        return <div className='gslogo--block'>

            <div className='gslogo--toolbar'>

                <label>{ gs_logo_slider_block.select_shortcode }</label>

                <select onChange={updateShortcodeID} value={shortcodeID}>
                    { getShortcodeOptions() }
                </select>

                <p className='gs-logo-slider-block--des'>

                    <span>
                        { gs_logo_slider_block.edit_description_text }
                        <a href={gs_logo_slider_block.edit_link + shortcodeID} target='_blank'>{ gs_logo_slider_block.edit_link_text }</a>
                    </span>

                    <span>
                        { gs_logo_slider_block.create_description_text }
                        <a href={gs_logo_slider_block.create_link} target='_blank'>{ gs_logo_slider_block.create_link_text }</a>
                    </span>

                </p>

            </div>

            <ServerSideRender className={className} block='gslogo/shortcodes' attributes={ attributes } />

        </div>
    }

    const Icon = function() {
        return <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><g clipPath="url(#clip0)"><circle cx="25" cy="25" r="25" fill="#E9E9FA"/><circle cx="41.3932" cy="6.14813" r="1.63934" fill="#9A8AFC"/><circle cx="43" cy="43" r="1" fill="#F99C7F"/><circle cx="4.09799" cy="44.6726" r="0.819672" fill="#72F2EB"/><circle cx="8.40183" cy="43.6477" r="2.2541" fill="#FDDB8C"/><circle cx="7.7876" cy="4.5081" r="0.819672" fill="#9A8AFC"/><circle cx="4.10245" cy="5.33292" r="1.64444" fill="#FE7086"/><g filter="url(#filter0_d)"><rect x="7" y="15.455" width="14.9049" height="18.6311" rx="3" fill="#FC9D7F"/></g><circle cx="14.365" cy="25.2751" r="3.68252" fill="#F07867"/><g filter="url(#filter1_d)"><rect x="29.0951" y="15.455" width="14.9049" height="18.6311" rx="3" fill="#EA8BF2"/></g><circle cx="36.4602" cy="25.2751" r="3.68252" fill="#DC79E4"/><g filter="url(#filter2_d)"><rect x="15.5926" y="13" width="19.4215" height="24.2769" rx="3" fill="#6472EF"/></g><circle cx="24.7989" cy="24.6613" r="4.29628" fill="#3F50EB"/></g><defs><filter id="filter0_d" x="-13" y="0.455015" width="54.9049" height="58.6311" filterUnits="userSpaceOnUse" colorInterpolationFilters="sRGB"><feFlood floodOpacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="5"/><feGaussianBlur stdDeviation="10"/><feColorMatrix type="matrix" values="0 0 0 0 0.3149 0 0 0 0 0.332345 0 0 0 0 0.423934 0 0 0 0.1 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter><filter id="filter1_d" x="9.09512" y="0.455015" width="54.9049" height="58.6311" filterUnits="userSpaceOnUse" colorInterpolationFilters="sRGB"><feFlood floodOpacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="5"/><feGaussianBlur stdDeviation="10"/><feColorMatrix type="matrix" values="0 0 0 0 0.3149 0 0 0 0 0.332345 0 0 0 0 0.423934 0 0 0 0.1 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter><filter id="filter2_d" x="-4.40744" y="-2" width="59.4215" height="64.2769" filterUnits="userSpaceOnUse" colorInterpolationFilters="sRGB"><feFlood floodOpacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="5"/><feGaussianBlur stdDeviation="10"/><feColorMatrix type="matrix" values="0 0 0 0 0.3149 0 0 0 0 0.332345 0 0 0 0 0.423934 0 0 0 0.1 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter><clipPath id="clip0"><rect width="50" height="50" fill="white"/></clipPath></defs></svg>
    }

    registerBlockType('gslogo/shortcodes', {

        title: __( 'GS Logo Slider', 'gslogo' ),
        description: __( 'Show Logos by GS Logo Slider Plugin', 'gslogo' ),
        icon: Icon,
        category: 'layout',
        description: gs_logo_slider_block.description,
        keywords: [ 'image', 'photo', 'pics' ],
        example: { attributes: {} },
        supports: {
            align: ['wide', 'full']
        },
        attributes: {
            shortcode: {
                type: 'string',
                default: gs_logo_slider_block.shortcodes[0].id || ''
            },
            align: {
                type: 'string',
                default: 'wide'
            }
        },
        edit: withSelect( () => {} )( BlockDisplay )

    });

}( window.wp, window.React, jQuery ));