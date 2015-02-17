<?php
/**
 * @package Hello_Princess
 * @version 1.0
 */
/*
Plugin Name: Hello Princess
Plugin URI: https://github.com/thewebprincess/hello-dolly/
Description: This is not just a plugin, it symbolizes the wild romance and adventure of an entire generation summed up in three words proposed most famously by William Goldman: The Princess Bride - "As You Wish". When activated you will randomly see a quote from <cite>The Princess Bride</cite> in the upper right of your admin screen on every page.
Author: Dee Teal
Version: 1.0
Author URI: http://thewebprincess.com/
*/

function hello_princess_get_quote() {
	/** These are the best lines from The Princess Bride */
	$quotes = "Hello
My name is Inigo Montoya
You killed my father
Prepare to die
You keep using that word
I do not think it means what you think it means
As You Wish
Mawage
Mawage is wot bwings us togeva today
Mawage, that bwessed awangment, that dweam wivin a dweam...
You're still goin' strong
You have a great gift for rhyme
First things first, to the death
No. To the pain
There's a shortage of perfect breasts in this world
It would be a pity to damage yours
Have you ever considered piracy?
We are men of action, lies do not become us
I can't compete with you physically
and you're no match for my brains
You've been mostly-dead all day
Death cannot stop true love, all it can do is delay it for a while.
you don't by any chance happen to have six fingers on your right hand
You're trying to kidnap what I've rightfully stolen
Please understand I hold you in the highest respect
I want my father back, you son of a bitch
Oh, what I wouldn't give for a holocaust cloak
You can die slowly, cut into a thousand pieces
Look, are you just fiddling around with me or what?
Rodents Of Unusual Size? I don't think they exist
Then there will be no one to hear you scream
Your princess is quite a winning creature
My way's not very sportsman-like";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_princess() {
	$chosen = hello_princess_get_quote();
	echo "<p id='princess'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_princess' );

// We need some CSS to position the paragraph
function princess_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#princess {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'princess_css' );

?>
