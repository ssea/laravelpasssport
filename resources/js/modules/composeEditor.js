import tinymce from 'tinymce';

/*
 * composeEditor use for loading wysiwyg editor library such as
 * CKEditor or TinyMCE base on your usage need
 * This make it easy to switch the editor without have to re-write
 * Your code base. Make your changes here and it done ;)
 * TODO: To use the plugin add
 * "data-compose-editor" attribute to your textarea
 * eg, <textarea data-compose-editor />
 */

// window.addEventListener('load', () => {
//   const textArea = $('textarea[data-compose-editor]');
//   if ($(textArea).length) {
//     tinymce.init({
//       selector: 'textarea[data-compose-editor]',
//       menubar: false,
//       statusbar: false,
//       // plugins: 'lists hr',
//       toolbar: 'undo redo | styleselect | alignleft aligncenter | bold italic',
//     });
//   }
// });

// /*
//  * Common Chunk
//  * The CommonsChunkPlugin is an opt-in feature that creates a separate file
//  * (known as a chunk), consisting of common modules shared between multiple
//  * entry points. By separating common modules from bundles, the resulting
//  * chunked file can be loaded once initially, and stored in cache for later use.
//  * This results in pagespeed optimizations as the browser can quickly serve
//  * the shared code from cache, rather than being forced to load a larger bundle
//  * whenever a new page is visited.
//  */
// require.ensure([], () => {
//   // Themes
//   require('tinymce/themes/silver/theme');

//   // Plugins
//   require('tinymce/plugins/lists/plugin');
//   require('tinymce/plugins/hr/plugin');
// });

tinymce.init({
  selector: 'textarea[data-compose-editor]',
  height: 500,
  menubar: false,
  plugins:[],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});

