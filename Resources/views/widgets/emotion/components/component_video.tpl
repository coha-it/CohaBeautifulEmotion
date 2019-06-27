{extends file="parent:widgets/emotion/components/component_video.tpl"}

        {block name="widget_emotion_component_video_element"}
            {strip}
            <video class="video--element"
                   poster=""
                   {if $Data.autobuffer} preload{/if}
                   {if $Data.autoplay} autoplay{/if}
                   {if $Data.loop} loop{/if}
                   {if $Data.controls} controls{/if}
                   {if $Data.muted} muted{/if}
                   {if $Data.loop && $Data.autoplay} playsinline{/if}>
                <source src="{link file=$Data.webm_video}" type="video/webm" />
                <source src="{link file=$Data.h264_video}" type="video/mp4" />
                <source src="{link file=$Data.ogg_video}" type="video/ogg" />
            </video>
            {/strip}
        {/block}