newyorker-podcast-mashup
========================

A mashup or remix of a New Yorker podcast feed with a local .mp3 player

Originally promoted during summer 2008: "Take the sounds of fiction with you as summer starts and reading season begins. The New Yorker has brought together contemporary writers such as Louise Erdrich, T. Coraghessan Boyle, E. L. Doctorow, Paul Theroux, and many more to read and discuss famous fiction from The New Yorker archives. Each episode is recorded as a podcast and ready for your .mp3 player… Or just listen to the podcast from your web browser over lunch. Either way, it’s summer time and the reading is easy."

Set any audio podcast feed as the source. Look for the lines below.
//set default value for podcast feed
$feed = isset($_GET['feed']) ? $_GET['feed'] : 'ADD_YOUR_PODCAST_FEED_HERE';
