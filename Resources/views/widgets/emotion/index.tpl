{extends file="parent:widgets/emotion/index.tpl"}

{* Emotion *}
{block name="widgets/emotion/index/emotion"}
    {if $emotion.attribute.coha_background_colour}
        <div class="coha--color-hack before" style="background-color: {$emotion.attribute.coha_background_colour}"></div>
    {/if}
    {$smarty.block.parent}
    {if $emotion.attribute.coha_background_colour}
        <div class="coha--color-hack after" style="background-color: {$emotion.attribute.coha_background_colour}"></div>
    {/if}
{/block}

{* CSS-Classes *}
{block name="widgets/emotion/index/classes"} {$smarty.block.parent}{if $emotion.attribute.coha_classes} {$emotion.attribute.coha_classes} {/if}{/block}

{* HTML-Attributes *}
{block name="widgets/emotion/index/attributes"}
    {$smarty.block.parent}
    style="{if $emotion.attribute.coha_background_colour} background-color: {$emotion.attribute.coha_background_colour}; {/if} {if $emotion.attribute.coha_inline_css} {$emotion.attribute.coha_inline_css} {/if} "
{/block}
