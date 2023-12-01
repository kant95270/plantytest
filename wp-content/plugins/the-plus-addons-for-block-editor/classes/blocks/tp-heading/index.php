<?php
/* Block : BlockQuote
 * @since : 2.0.0
 */
defined( 'ABSPATH' ) || exit;

function tpgb_tp_core_heading_callback($attr, $content) {
	return Tpgb_Blocks_Global_Options::block_Wrap_Render($attr, $content);
}

function tpgb_tp_core_heading_render() {
    $globalBgOption = Tpgb_Blocks_Global_Options::load_bg_options();
    $globalpositioningOption = Tpgb_Blocks_Global_Options::load_positioning_options();
	$globalPlusExtrasOption = Tpgb_Blocks_Global_Options::load_plusextras_options();
    $attributesOptions = [
        'block_id' => [
            'type' => 'string',
            'default' => '',
        ],
        'title' => [
            'type' => 'string',
            'default' => 'Add Your Heading Text Here',
        ],
        'tLink' => [
            'type'=> 'object',
            'default'=> [
                'url' => '',
                'target' => '',
                'nofollow' => ''
            ],
        ],
        'tTag' => [
            'type' => 'string',
            'default' => 'h3',
        ],
        'tColor' => [
            'type' => 'string',
            'default' => '',
            'style' => [
                (object) [
                    'selector' => '{{PLUS_WRAP}}.tp-core-heading { color: {{tColor}}; }',
                ],
            ],
            'scopy' => true,
        ],
        'tTypo' => [
            'type'=> 'object',
            'default'=> (object) [
                'openTypography' => 0,
                'size' => [ 'md' => '', 'unit' => 'px' ],
            ],
            'style' => [
                (object) [
                    'selector' => '{{PLUS_WRAP}}.tp-core-heading',
                ],
            ],
            'scopy' => true,
        ],
        'tAlign' => [
            'type' => 'object',
            'default' => [ 'md' => '', 'sm' =>  '', 'xs' =>  '' ],
            'style' => [
                (object) [
                    'selector' => '{{PLUS_WRAP}}{ text-align: {{tAlign}}; }',
                ],
            ],
        ],
        'tStroke' => [
            'type'=> 'object',
            'groupField' => [
                (object) [
                    'tstWidth' => [
                        'type' => 'object',
                        'default' => [ 
                            'md' => '',
                            "unit" => 'px',
                        ],
                        'style' => [
                            (object) [
                                'selector' => '{{PLUS_WRAP}} { -webkit-text-stroke-width: {{tstWidth}}; stroke-width : {{tstWidth}}; }',
                            ],
                        ],
                        'scopy' => true,
                    ],
                    'tstColor' => [
                        'type' => 'string',
                        'default' => '',
                        'style' => [
                            (object) [
                                'selector' => '{{PLUS_WRAP}} { -webkit-text-stroke-color: {{tstColor}}; stroke: {{tstColor}}; }',
                            ],
                        ],
                        'scopy' => true,
                    ],
                ],
            ],
            'default' => [ 
                [ 'tstWidth' => [ 'md' => '' ], 'tstColor' => '' ]
            ],
        ],
        'tShadow' => [
            'type' => 'object',
            'default' => (object) [
                'openShadow' => 0,
                'typeShadow' => 'text-shadow',
                'horizontal' => 2,
                'vertical' => 3,
                'blur' => 2,
                'color' => "rgba(0,0,0,0.5)",
            ],
            'style' => [
                (object) [
                    'selector' => '{{PLUS_WRAP}}',
                ],
            ],
            'scopy' => true,
        ],
        'tblendm' => [
            'type' => 'string',
            'default' => '',
            'style' => [
                (object) [
                    'selector' => '{{PLUS_WRAP}} { mix-blend-mode: {{tblendm}}; }',
                ],
            ],
            'scopy' => true,
        ],
        'anchor' => [
            'type' => 'string',
        ],
    ];

    $attributesOptions = array_merge($attributesOptions	, $globalBgOption, $globalpositioningOption, $globalPlusExtrasOption);

    register_block_type( 'tpgb/tp-heading', array(
		'attributes' => $attributesOptions,
		'editor_script' => 'tpgb-block-editor-js',
		'editor_style'  => 'tpgb-block-editor-css',
        'render_callback' => 'tpgb_tp_core_heading_callback'
    ));
}
add_action( 'init', 'tpgb_tp_core_heading_render' );