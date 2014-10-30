<?php

/*
*
*
*/

define( 'BASE_URL', 'http://localhost:2080/' );


function GET( $szKey,  $filter = FILTER_DEFAULT )
{
    return filter_input( INPUT_GET, $szKey, $filter );
}

function POST( $szKey, $filter = FILTER_DEFAULT )
{
    return filter_input( INPUT_POST, $szKey, $filter );
}