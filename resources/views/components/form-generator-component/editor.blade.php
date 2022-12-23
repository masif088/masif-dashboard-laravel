@props(['repository'])
<div wire:ignore>
    <label for=""
           class="block text-gray-500 text-sm font-bold mb-2 dark:text-light" for="username">
        {{ $repository['title'] }}
    </label>
  <textarea name="data{{ $repository['model'] }}" id="data{{ $repository['model'] }}">
  </textarea>
    <script>
        document.addEventListener('livewire:load', function () {
            const useDarkMode = window.localStorage.getItem('dark') === "true";
            const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;


            tinymce.init({
                selector: 'textarea#data{{ $repository['model'] }}',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',

                setup: function (editor) {
                    editor.on('init change', function () {
                        editor.save();
                    });
                    editor.on('change', function (e) {
                        @this.
                        set('data.aaa', editor.getContent());
                    });
                },

                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: useDarkMode ? '{{ asset('vendor/tinymce/dark.css') }}' : '{{ asset('vendor/tinymce/light.css') }}',
            });
            $("#data{{ $repository['model'] }}").val(@this.get('data.{{ $repository['model'] }}'));
            $(".tox-tinymce").last().addClass("dark:border-primary")
        });
    </script>
</div>
