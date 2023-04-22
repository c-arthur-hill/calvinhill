@extends('base')

@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto mb-5">
                <h3>Crashing this site</h3>
                <p>I've crashed production a few times in my career.</p>
                <p>Developers have a reputation for over-engineered personal websites.</p>
                <p>I've built this to match the real environments I've worked in. I can recover from mistakes here.</p>
                <h3>Less</h3>
                <p>How can I crash less?</p>
                <p>First, I think back to the production crashes I've seen. The most common cause was broken code passing review and staging environments.</p>
                <p>The second biggest reason was peak loads overloading weak parts of the system.</p>
                <p>The third would probably be broken integrations. A partner API had downtime or a piece of configuration wasn't set correctly.</p>
                <p>The rarest cause of outages was core infrastructure failing. This would be Amazon Web Services (AWS), who hosts our applications, going down. Or problems with an Internet Service Provider.</p>
                <p class="mt-5 mb-5 clearfix">
                <span class="float-start">
                    <a href="{{ route('media.bulk.edit') }}" class="">Previous<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
                <!--
                <span class="float-end">
                    <a href="{{ route('deployment') }}" class="">Next</a>
                </span>
                    -->
                </p>
                <h3>On Docker, Heroku & Git</h3>
                <p>I trust them, so I can focus on reviewing code, moving it through staging and testing for peak load.</p>
                <p>I've come to expect a similar workflow. The code is hosted in a git repository. On my first day, I clone it then create a .env file that holds all the passwords.</p>
                <p>The repository usually contains a docker compose file. After downloading docker desktop, I can run a command and several docker containers start. One will have a postgresql or mysql database. One has a server for the application PHP / Laravel code. This one usually also builds and serves the frontend code. Tests often run in their own container.</p>
                <p>I only login to the application code container. I do this to generate "migration" files, which generate the commands to alter the structure of the database. Migrations are useful so that other developers can receive my changes.</p>
                <p>In development, I often have to login to stop or start a queue. I talked about this on the lasts page. In production it usually runs on it's own.</p>
                <p>I use a Integrated Development Environment (IDE) called PHPStorm. It shows all the code from the repository inside the docker container. It has tools to search, modify and debug code.</p>
                <p>When I'm done with my changes I "commit" them with Git. This saves all the changes I've made. Then I can push this to either a dev, staging or production environment.</p>
                <p>Dev is useful for testing things like API integrations. All the developers share it, so only one person can use it for testing at a time. It's main usefulness is that it has a url. So it'd be like dev.calvinhill.com (doesn't exist). If I'm testing fetching data from the Twitter API programatically, they need somewhere to send the response. This is often easier with a server url and ip address.</p>
                <p>If I'm demoing my changes in a meeting or testing with an external client, I'd push to staging. Outside customers are given credentials to login there. For example, big customers of the apparel printer would be able to login there to check integrations with their systems were working.</p>
                <p>Finally, producation is the main environment that serves a website. For me I run on Heroku because it is very easy to deploy. When I push changes to my GitHub repository, the changes are automatically deployed to Heroku. I have a Redis server and small MySQL database. It's easy to increase the size of things.</p>
                <p>I've deployed on AWS running Nginx or Apache on Ubuntu Servers. I've also deployed Docker containers to autoscale in AWS. Small misconfigurations easily cause outages. Heroku is much easier to keep running.</p>
            </div>
        </div>
    </div>
@endsection
