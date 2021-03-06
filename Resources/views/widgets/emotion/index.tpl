{extends file="parent:widgets/emotion/index.tpl"}

{* CSS-Classes *}
{block name="widgets/emotion/index/classes"} {$smarty.block.parent}{if $emotion.attribute.coha_classes} {$emotion.attribute.coha_classes} {/if}{/block}

{* HTML-Attributes *}
{block name="widgets/emotion/index/attributes"}
    {$smarty.block.parent}

                {*
                    HTML-Tags:
                *} {if $emotion.attribute.coha_html_tags} {$emotion.attribute.coha_html_tags} {/if}
{/block}


{* Emotion *}
{block name="widgets/emotion/index/emotion"}

    {$coha_background_color          = $emotion.attribute.coha_background_color}
    {$coha_font_color                = $emotion.attribute.coha_font_color}
    {$coha_background_img_url        = $emotion.attribute.coha_background_img_url}
    {$coha_background_size           = $emotion.attribute.coha_background_size}
    {$coha_background_position       = $emotion.attribute.coha_background_position}
    {$coha_background_repeat         = $emotion.attribute.coha_background_repeat}
    {$coha_background_attachment     = $emotion.attribute.coha_background_attachment}
    {$coha_width                     = $emotion.attribute.coha_width}
    {$coha_max_width                 = $emotion.attribute.coha_max_width}

    <div class="emotion--container-wrapper-outer" id="emotion--id--{$emotion.id}" >
        {if $emotion.attribute.coha_background_color} <div class="coha--color-hack before"></div> {/if}
            <div class="emotion--container-wrapper">
                {$smarty.block.parent}
            </div>
        {if $emotion.attribute.coha_background_color} <div class="coha--color-hack after"></div> {/if}
    </div>

    {* Styling *}
    <style type="text/css">
        #emotion--id--{$emotion.id} {
            {if $coha_background_color}
                background-color:       {$coha_background_color};
            {/if}
            {if $coha_font_color}
                color:                  {$coha_font_color};
            {/if}
            {if $coha_background_img_url}
                background-image:   url({$coha_background_img_url});
            {/if}
            {if $coha_background_size}
                background-size:        {$coha_background_size};
            {/if}
            {if $coha_background_position}
                background-position:    {$coha_background_position};
            {/if}
            {if $coha_background_repeat}
                background-repeat:      {$coha_background_repeat};
            {/if}

            {if $coha_background_attachment}
                background-attachment:  {$coha_background_attachment};
            {/if}

            {if $emotion.attribute.coha_inline_css}
                {$emotion.attribute.coha_inline_css};
            {/if}
        }

        #emotion--id--{$emotion.id} .emotion--container-wrapper {
            {if $coha_width}
                width: {$coha_width};
            {/if}
            
            {if $coha_max_width}
                max-width: {$coha_max_width};
            {/if}
        }

        #emotion--id--{$emotion.id} .coha--color-hack {
            {if $emotion.attribute.coha_background_color}
                background-color: {$emotion.attribute.coha_background_color};
            {/if}
        }
    </style>

    {* Global Rule *}
    {if $emotion.attribute.coha_css_rule_global}
        <style type="text/css">{$emotion.attribute.coha_css_rule_global}</style>
    {/if}
{/block}

