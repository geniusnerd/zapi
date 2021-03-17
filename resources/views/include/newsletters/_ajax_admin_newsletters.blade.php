@php
    isset($_GET['sort']) ? $sort= $_GET['sort'] : $sort = 'najnovije';
    isset($_GET['query']) ? $query= $_GET['query'] : $query = false;
@endphp
<div class="main-body">
    <div class="container sec-background">
        <div class="head-content">
            <p>NEWSLETTERS</p>
        </div>
        <div class="main-body-list">
            <table>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Aktivnosti</th>
                </tr>
                @foreach ($newsletters as $nl)
                    <tr>
                        <td>{{ $br++ }}</td>
                        <td>{{ $nl->email }}</td>
                        <td>
                            <div class="delete-article tooltip" tooltip="Obriši">
                                <form class='forma' method="POST" id="form_{{$nl->id}}"
                                      action="{{route('newsletters-destroy', $nl->id)}}">
                                    <button onclick="deleteModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.991" height="19.998"
                                             viewBox="0 0 17.991 19.998">
                                            <g id="icons8_Remove_96px_1" transform="translate(-11.97 -7.93)">
                                                <path id="Path_109" data-name="Path 109"
                                                      d="M19.023,7.99a31.513,31.513,0,0,1,3.885,0c.394.275.712.642,1.106.914,1.977.11,3.965.007,5.947.042-.015.667-.015,1.331,0,2H11.97c.015-.667.015-1.331,0-2,1.982-.035,3.97.067,5.947-.042C18.312,8.632,18.629,8.265,19.023,7.99Z"
                                                      transform="translate(0 0)" fill="#c5c9d5"/>
                                                <path id="Path_110" data-name="Path 110"
                                                      d="M17.52,28H32.737c-.442,4.167-.966,8.329-1.418,12.5a2.837,2.837,0,0,1-.734,1.955,2.927,2.927,0,0,1-2.207.537c-2.5-.035-5.011.035-7.515-.03A2.019,2.019,0,0,1,19,40.973C18.514,36.648,17.987,32.327,17.52,28Z"
                                                      transform="translate(-4.164 -15.059)" fill="#c5c9d5"/>
                                            </g>
                                        </svg>
                                    </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $newsletters->appends(['sort'=>$sort, 'query' => $query])->links('vendor/pagination/paginate-newsletters-admin') }}
        </div>
    </div>
</div>


