<template>
    <span><read-more
            :text="field.value"
            :max="field.options.max"
            :mask="field.options.mask"
    ></read-more></span>
</template>

<script>

    export default {
        props: ['resourceName', 'field'],
    }
</script>