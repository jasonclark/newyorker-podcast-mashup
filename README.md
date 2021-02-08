# newyorker-podcast-mashup
-----

A mashup or remix of a New Yorker podcast feed with a local .mp3 player

Originally promoted during summer 2008: "Take the sounds of fiction with you as summer starts and reading season begins. The New Yorker has brought together contemporary writers such as Louise Erdrich, T. Coraghessan Boyle, E. L. Doctorow, Paul Theroux, and many more to read and discuss famous fiction from The New Yorker archives. Each episode is recorded as a podcast and ready for your .mp3 player… Or just listen to the podcast from your web browser over lunch. Either way, it’s summer time and the reading is easy."

## Getting Started
 1. Set any audio podcast feed as the source. You might check [Google Podcasts](https://podcasts.google.com/) or [iHeartRadio](https://www.iheart.com/podcast/) for example podcast RSS feeds.
 2. Copy the [RSS feed](https://en.wikipedia.org/wiki/RSS) URL you want to add to your clipboard.
 3. Open the index.php file in a text editor and look for: 
```$feed = isset($_GET['feed']) ? $_GET['feed'] : 'ADD_YOUR_PODCAST_FEED_HERE';```
 4. Set the $feed variable with your chosen RSS feed URL and save the file in a public directory.

## Technology

* HTML
* CSS
* PHP
* RSS

## People

Crafted with :heart: by [Jason A. Clark](http://www.jasonclark.info) sameAs [@jaclark](https://twitter.com/jaclark)
