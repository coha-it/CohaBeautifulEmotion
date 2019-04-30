{extends file="parent:widgets/emotion/index.tpl"}

{* Emotion *}
{block name="widgets/emotion/index/emotion"}
    {if $emotion.attribute.coha_background_colour}
        <div class="coha--color-hack before" style="background-color: {$emotion.attribute.coha_background_colour};"></div>
    {/if}
    {$smarty.block.parent}
    {if $emotion.attribute.coha_background_colour}
        <div class="coha--color-hack after" style="background-color: {$emotion.attribute.coha_background_colour};"></div>
    {/if}

    {* Global Rule *}
    {if $emotion.attribute.coha_css_rule_global}
        <style type="text/css">{$emotion.attribute.coha_css_rule_global}</style>
    {/if}
{/block}

{* CSS-Classes *}
{block name="widgets/emotion/index/classes"} {$smarty.block.parent}{if $emotion.attribute.coha_classes} {$emotion.attribute.coha_classes} {/if}{/block}

{* HTML-Attributes *}
{block name="widgets/emotion/index/attributes"}
    {$smarty.block.parent}
    style="{*
        Inline-CSS Special Rules inside style=""
    *}{if $emotion.attribute.coha_background_colour} background-color: {$emotion.attribute.coha_background_colour}; {/if} {*
    *} {if $emotion.attribute.coha_font_colour} color: {$emotion.attribute.coha_font_colour}; {/if} {*
    *} {if $emotion.attribute.coha_background_img_url} background-image: url({$emotion.attribute.coha_background_img_url}); {/if} {*
    *} {if $emotion.attribute.coha_background_size} background-size: {$emotion.attribute.coha_background_size}; {/if} {*
    *} {if $emotion.attribute.coha_background_position} background-position: {$emotion.attribute.coha_background_position}; {/if} {*
    *} {if $emotion.attribute.coha_background_repeat} background-repeat: {$emotion.attribute.coha_background_repeat}; {/if} {*
        Pure Inline-CSS:
    *} {if $emotion.attribute.coha_inline_css} {$emotion.attribute.coha_inline_css}; {/if}"{*
        HTML-Tags:
    *} {if $emotion.attribute.coha_html_tags} {$emotion.attribute.coha_html_tags} {/if}
{/block}
