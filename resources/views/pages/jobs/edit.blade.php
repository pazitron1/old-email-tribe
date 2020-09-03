@extends('layouts.app')
@section('css')
    <style>
        trix-toolbar .trix-button-group--file-tools {
          display: none!important;
        }
        h2 {
            font-size: 1.4rem;
            line-height: 2rem;
            padding-bottom: 5px;
            color:#1a202c;
        }
        .content p {
            padding-bottom: 1rem;
        }
        .content p, strong, del, em, blockquote, ul, ol {
            font-size: 1rem;
            color: #2d3748;
        }
        .content a {
            text-decoration: underline;
            color: #667eea;
            font-weight: bold;
        }
        .content a:hover {
            color: #5a67d8;
        }
        .content blockquote {
            color: #718096;
            padding: 10px;
            font-style: italic;
        }
        .content blockquote::before, .content blockquote::after {
            content: '"';
        }
        .content ul {
            list-style: disc;
        }
        .content ol {
            list-style: decimal;
        }
        .content ul li, .content ol li {
            padding-bottom: 5px;
        }
        @media only screen and (max-width: 640px) {
            h2 {
                font-size: 1.2rem;
                line-height: 1.4rem;
            }
        }
    </style>
@endsection

@section('content')
     <edit-job
        :job-object="{{$job}}"
        :all-categories="{{$categories}}">
    </edit-job>
@endsection
