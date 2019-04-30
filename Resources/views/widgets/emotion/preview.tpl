{extends file="parent:widgets/emotion/preview.tpl"}

{*block name="widgets_emotion_preview_wrapper"}
    <div class="emotion--wrapper test6"
         data-controllerUrl="{url module=widgets controller=emotion action=index emotionId=$emotion.id secret=$previewSecret controllerName=$Controller}"
         data-availableDevices="{$emotion.devices}"
         data-showListing="{if $emotion.showListing == 1}true{else}false{/if}">
    </div>
{/block*}
