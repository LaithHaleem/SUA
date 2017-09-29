<?php

function randchar() {
	$s = substr(str_shuffle(str_repeat("01RGSKhijk327YBa78lmnYTIopqrsZAt9DHbcdefguvKwxyz", 5)), 0, 5);

	return $s;
}

function randpic() {
	$rand = substr(str_shuffle(str_repeat("3dsfbcWuvKw327Yt9DHaaASYt9lDHaDw45ehf", 5)), 0, 5);

    return $rand;
}