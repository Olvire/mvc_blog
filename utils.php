<?php
function pretty_timestamp ($timestamp) {
	return date("h:i A \o\\n Y-m-d", strtotime($timestamp));
}