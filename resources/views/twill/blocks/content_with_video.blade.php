@twillBlockTitle('Content With Video')
@twillBlockIcon('video')
@twillBlockGroup('app')

<x-twill::input
    name="youtube_url"
    label="Youtube URl"
/>

<x-twill::select
    name="position"
    label="Video position"
    placeholder="Select an video position"
    :options="[
        [
            'value' => 'left',
            'label' => 'Left'
        ],
        [
            'value' => 'right',
            'label' => 'Right'
        ],
    ]"
    default="left"
/>

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
