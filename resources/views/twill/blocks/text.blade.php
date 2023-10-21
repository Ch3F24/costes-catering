@twillBlockTitle('Text')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::wysiwyg
    name="content"
    label="Content"
    placeholder="Content"
    :toolbar-options="[
        [ 'header' => [1, 2, 3, 4, false] ],
        'bold',
        'italic',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        [ 'script' => 'super' ],
        [ 'script' => 'sub' ],
        'link',
        'clean'
    ]"
    :translated="true"
/>
