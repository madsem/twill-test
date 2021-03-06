@php

    //get the project ID from the browser field
    $projectsIDs = $block->browserIds('projects');
    //get the project
    $projects = app(\App\Models\Project::class)->find($projectsIDs);

@endphp

@if( count( $projects ) >= 1 )

    @foreach( $projects as $project )

        @php

            $classAlign = '';

            if(\LeftRight::get() == 'left') {
                echo '<div class="cf"></div>';
            } else {
                $classAlign = 'floatRight';
            }

            \LeftRight::step();

            if( $block->input('row_end') == 1 ) {
                \LeftRight::set( 'left' );
            }

        @endphp

        <div class="g g{{ $block->input('project_preview_width') }}-12 {{ $classAlign }} gBreakTablet">

            <h2 class="previewModuleTitle">
                <a href="/project/{{ $project->slug }}">
                    {{ $project->title }}
                </a>
            </h2>


            @php
                //get the tags
                $projectTagRelationship = $project->projecttags();
                $projectTags = $projectTagRelationship->get();
            @endphp


            <ul class="horizontal">
                @foreach( $projectTags as $projectTag )
                    <li>
                        <a href="/tagged/{{ $projectTag->slug }}">{{ $projectTag->title }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="/project/{{ $project->slug }}">
                {{ ImageHelper::render(
                    $project->image('design_page_images','default'),
                    $project->imageAltText('design_page_images')
                ) }}
            </a>

        </div>

    @endforeach

@endif