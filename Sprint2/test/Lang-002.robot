*** Settings ***
Resource    resource.robot
Resource    dashboard_resource.robot
# LANG-002 Test Scenario Name: เปลี่ยนภาษาในส่วนผู้ดูแลระบบ (Admin Section)  

*** Test Cases ***

Test lang-002-Switch language Admin Section
    Log To Console    =====login to dashboard====
    Open site
    click login button
    check current url
    
    toggle admin dropdown
    select admin TH
    check login title is TH

    toggle admin dropdown
    select admin CN
    check login title is CN

    toggle admin dropdown
    select admin EN
    
    input Admin user and password
    submit
    
    Log To Console    ====dashboard page====
    #defaul is EN
    check sidebar is EN
    check dashboard page is EN

    
    toggle admin dropdown
    select admin TH
    check dashboard page is TH
    toggle admin dropdown
    select admin CN
    check dashboard page is CN
    sleep   1s
    
    Log To Console    ====user profile====
    click user profile
    toggle admin dropdown
    select admin TH
    check user profile page is TH
    toggle admin dropdown
    select admin CN
    check user profile page is CN
    sleep   1s

    Log To Console    ====manage fund====
    click manage fund
    toggle admin dropdown
    select admin TH
    check manage fund page is TH
    toggle admin dropdown
    select admin CN
    check manage fund page is CN
    sleep   1s

    Log To Console    ====research project====
    click research project
    toggle admin dropdown
    select admin TH
    check research project is TH
    toggle admin dropdown
    select admin CN
    check research project is CN
    sleep   1s

    Log To Console    ====research group====
    click research group
    toggle admin dropdown
    select admin TH
    check research group is TH
    toggle admin dropdown
    select admin CN
    check research group is CN
    sleep   1s

    Log To Console    ====publication research ====
    click manage publication
    click publiccation research
    toggle admin dropdown
    select admin TH
    check publication research is TH
    toggle admin dropdown
    select admin CN
    check publication research is CN  
    sleep   1s

    Log To Console    ====book ====
    click manage publication
    click book
    toggle admin dropdown
    select admin TH
    check book is TH
    toggle admin dropdown
    select admin CN
    check book is CN
    sleep   1s

    Log To Console    ====other academic works====
    click manage publication
    click other academic works
    toggle admin dropdown
    select admin TH
    check other academic works is TH
    toggle admin dropdown
    select admin CN
    check other academic works is CN
    Close Browser Session