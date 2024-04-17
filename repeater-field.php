<?php

//1 is the form id

add_filter( 'gform_form_post_get_meta_1', function ($form){
    $field1 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1001,
        'formId' => $form['id'],
        'label'  => 'FORTEC Produkt Nr. (xx-xx-xxx)',
        'pageNumber'  => 1,
    ) );

    $field2 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1002,
        'formId' => $form['id'],
        'label'  => 'Beschreibung',
        'pageNumber'  => 1,
    ) );

    $field3 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1003,
        'formId' => $form['id'],
        'label'  => 'Serien Nr.',
        'pageNumber'  => 1,
    ) );

    $field4 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1004,
        'formId' => $form['id'],
        'label'  => 'Rechnung Nr.',
        'pageNumber'  => 1,
    ) );

    $field5 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1005,
        'formId' => $form['id'],
        'label'  => 'Date code (nur bei Panels)',
        'pageNumber'  => 1,
    ) );

    $field6 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1006,
        'formId' => $form['id'],
        'label'  => 'QM Meldungsnr. (von FORTEC auszufüllen)',
        'pageNumber'  => 1,
    ) );

    $field7 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1007,
        'formId' => $form['id'],
        'label'  => 'Fehlerbeschreibung',
        'pageNumber'  => 1,
    ) );

    $field8 = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1008,
        'formId' => $form['id'],
        'label'  => 'Fehler erkannt bei',
        'pageNumber'  => 1,
    ) );

    $field9 = GF_Fields::create( array(
        'type'   => 'checkbox',
        'id'     => 1009,
        'formId' => $form['id'],
//        'required' => true,
        'label'  => 'wird von FORTEC ausgefüllt',
        'choices'  => array(
            array('text'  => 'kosten- pflichtig', 'value' => 'kosten- pflichtig'),
            array('text'  => 'repariert ', 'value' => 'repariert'),
            array('text'  => 'ersetzt', 'value' => 'ersetzt'),
            array('text'  => 'irreparabel', 'value' => 'irreparabel'),
            array('text'  => 'kein Fehler feststellbar', 'value' => 'kein Fehler feststellbar'),
        ),
        'inputs' => array(
            array( 'id'    => '1009.1', 'label' => 'kosten- pflichtig'),
            array( 'id'    => '1009.2', 'label' => 'repariert'),
            array( 'id'    => '1009.3', 'label' => 'ersetzt'),
            array( 'id'    => '1009.4', 'label' => 'irreparabel'),
            array( 'id'    => '1009.5', 'label' => 'kein Fehler feststellbar'),
        ),
        'pageNumber'  => 1,
    ) );

    $field10 = GF_Fields::create( array(
        'type'   => 'html',
        'formId' => $form['id'],
        'content' => '<h4>Artikel </h4>',
        'pageNumber'  => 1,
    ) );


    $team = GF_Fields::create( array(
        'type'             => 'repeater',
        'description'      => '',
        'id'               => 1000,
        'formId'           => $form['id'],
//        'label'            => 'Artikel',
        'addButtonText'    => 'Artikel hinzufügen',
        'removeButtonText' => 'Artikel entfernen',
//        'maxItems'         => 3,
        'pageNumber'       => 1,
        'fields'           => array( $field10, $field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8, $field9 ),
    ) );

    $form['fields'][] = $team;

    return $form;
} );


add_filter( 'gform_form_update_meta_1', function ($form_meta, $form_id, $meta_name){
    if ( $meta_name == 'display_meta' ) {

        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 1000 ), 'NOT' );
    }

    return $form_meta;
}, 10, 3 );
