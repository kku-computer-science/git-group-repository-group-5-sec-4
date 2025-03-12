*** Settings ***
Library    SeleniumLibrary
Library    String


*** Variables ***
${login_path}    xpath=/html/body/nav/div/div/span/a
${username_path}    xpath=/html/body/div/div[2]/div[2]/form/div[1]/input
${pass_path}    xpath=/html/body/div/div[2]/div[2]/form/div[2]/input
${submit_path}    xpath=/html/body/div/div[2]/div[2]/form/div[4]/button

#side bar path
${dashboard_side_text_path}    xpath=/html/body/div/div/nav/ul/li[1]/a/span
${option_side_text_path}    xpath=/html/body/div/div/nav/ul/li[4]
${admin_side_text_path}    xpath=/html/body/div/div/nav/ul/li[9]
${user_profile_path}    xpath=/html/body/div/div/nav/ul/li[3]/a
${manage_fund_path}    xpath=/html/body/div/div/nav/ul/li[5]/a
${research_project_path}    xpath=/html/body/div/div/nav/ul/li[6]/a
${research_group_path}    xpath=/html/body/div/div/nav/ul/li[7]/a
${manage_publication_drop_path}    xpath=/html/body/div/div/nav/ul/li[8]/a/span
${publiccation_research_path}    xpath=/html/body/div/div/nav/ul/li[8]/div/ul/li[1]/a
${book_path}   xpath=/html/body/div/div/nav/ul/li[8]/div/ul/li[2]/a
${other_academic_works_path}    xpath=/html/body/div/div/nav/ul/li[8]/div/ul/li[3]/a
${manage_programs_path}    xpath=/html/body/div/div/nav/ul/li[10]/a/span
#dropdown
${drop_down_path}    xpath=/html/body/div/nav/div[2]/ul[2]/li[1]/a
${EN_path}    xpath=//a[contains(text(), 'English')]
${TH_path}    xpath=//a[contains(text(), 'ไทย')]
${CN_path}    xpath=//a[contains(text(), '中文')]
#page text path
${dashboard_page_text}    xpath=/html/body/div[1]/div/div/div/h3
${user_profile_text}    xpath=/html/body/div/div/div/div/div/div[1]/div[1]/div[2]/a[1]/span
${manage_fund_text}    xpath=/html/body/div/div/div/div/div/div/div/h4
${research_project_text}    xpath=/html/body/div/div/div/div/div/div/div/h4
${research_group_text}    xpath=/html/body/div/div/div/div/div/div/div/h4
${login_title_text}    xpath=/html/body/div/div[2]/div[1]/h1

${publication_research_text}    xpath=/html/body/div/div/div/div/div/div/div/h4
${book_text}    xpath=/html/body/div/div/div/div/div/div/div/h4
${other_academic_works_text}    xpath=/html/body/div/div/div/div/div/div/div/h4

${manage_programs_text}    xpath=/html/body/div/div/div/div[1]/div/div/h4

${expec_dashboard_side_text_EN}    Dashboard
${expec_option_side_text_EN}    OPTION
${expec_admin_side_text_EN}   ADMIN

${expec_dashboard_page_text_EN}     Welcome to the Research Information Management System
${expec_dashboard_page_text_TH}     ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์
${expec_dashboard_page_text_CN}     欢迎来到研究信息管理系统

${expec_user_profile_text_TH}      บัญชี
${expec_user_profile_text_CN}      帐户

${expec_manage_fund_text_TH}    ทุนวิจัย
${expec_manage_fund_text_CN}    研究基金

${expec_research_project_text_TH}    โครงการวิจัย
${expec_research_project_text_CN}    研究项目

${expec_research_group_text_TH}    กลุ่มวิจัย
${expec_research_group_text_CN}    研究小组

${expec_publication_research_text_TH}   ผลงานวิจัยที่ตีพิมพ์
${expec_publication_research_text_CN}   已发表的研究

${expec_book_text_TH}    หนังสือ
${expec_book_text_CN}    书籍

${expec_other_academic_works_text_TH}    ผลงานวิชาการอื่นๆ (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
${expec_other_academic_works_text_CN}    其他学术作品

${expec_manage_programs_text_TH}    จัดการหลักสูตร
${expec_manage_programs_text_CN}    管理项目

${expec_login_title_TH}    เข้าสู่ระบบ
${expec_login_title_CN}    帐户登录

*** Keywords ***

click login button
    Wait Until Element Is Visible    ${login_path}    timeout=10s
    Click Element    ${login_path}
    Sleep    2s  #
    Switch Window    NEW  
    Wait Until Location Is    https://cs0567.cpkkuhost.com/login   timeout=10s

click user profile 
    Click Element    ${user_profile_path}
    Wait Until Element Is Visible    ${user_profile_path}

click manage program 
    Click Element    ${manage_programs_path}
    Wait Until Element Is Visible    ${manage_programs_path}

click manage fund
    Click Element    ${manage_fund_path}
    Wait Until Element Is Visible    ${manage_fund_path}
click research project
    Click Element    ${research_project_path}
    Wait Until Element Is Visible    ${research_project_path}
click research group
    Click Element    ${research_group_path}
    Wait Until Element Is Visible    ${research_group_path}

click manage publication
    Click Element    ${manage_publication_drop_path}
    Wait Until Element Is Visible    ${manage_publication_drop_path}

click publiccation research
    Click Element    ${publiccation_research_path}
    Wait Until Element Is Visible    ${publiccation_research_path}

click book
    Click Element    ${book_path}
    Wait Until Element Is Visible    ${book_path}
click other academic works 
    Click Element    ${other_academic_works_path}
    Wait Until Element Is Visible    ${other_academic_works_path}
toggle admin dropdown
    Execute JavaScript    document.querySelector(".nav-item.dropdown").classList.add("show");
    Execute JavaScript    document.querySelector(".dropdown-menu").classList.add("show");
    Sleep    2s
select admin EN
    Click Element    ${EN_path}
select admin TH
    Click Element    ${TH_path}
select admin CN
    Click Element    ${CN_path}
   
check current url
    ${current_url}    Get Location
    Should Be Equal As Strings    ${current_url}    https://cs0567.cpkkuhost.com/login  
input Admin user and password
    Input Text    ${username_path}    admin@gmail.com 
    sleep   1s
    Input Text    ${pass_path}    12345678
    sleep   1s
input Researcher user and password
    Input Text    ${username_path}    Punhor1@kku.ac.th
    sleep   1s
    Input Text    ${pass_path}    123456789
    sleep   1s
input Staff user and password
    Input Text    ${username_path}    staff@gmail.com 
    sleep   1s
    Input Text    ${pass_path}    123456789
    sleep   1s
submit 
    Click Element    ${submit_path}
    Wait Until Location Is    https://cs0567.cpkkuhost.com/dashboard    timeout=10s


check sidebar is EN
    ${text1}    Get Text    ${dashboard_side_text_path}
    Should Be Equal As Strings    ${text1}    ${expec_dashboard_side_text_EN}

    ${text2}    Get Text    ${option_side_text_path}
    Should Be Equal As Strings    ${text2}    ${expec_option_side_text_EN}

    ${text3}    Get Text    ${admin_side_text_path}
    Should Be Equal As Strings    ${text3}    ${expec_admin_side_text_EN}
check default is EN
    check sidebar is EN

check dashboard page is EN
    ${text}    Get Text    ${dashboard_page_text}
    Should Be Equal As Strings    ${text}    ${expec_dashboard_page_text_EN}   
check dashboard page is TH
    ${text}    Get Text    ${dashboard_page_text}
    Should Be Equal As Strings    ${text}    ${expec_dashboard_page_text_TH}   
check dashboard page is CN
    ${text}    Get Text    ${dashboard_page_text}
    Should Be Equal As Strings    ${text}    ${expec_dashboard_page_text_CN}
check user profile page is TH
    ${text}    Get Text    ${user_profile_text}
    Should Be Equal As Strings    ${text}    ${expec_user_profile_text_TH}   
check user profile page is CN
    ${text}    Get Text    ${user_profile_text}
    Should Be Equal As Strings    ${text}    ${expec_user_profile_text_CN}   
check manage fund page is TH
    ${text}    Get Text    ${manage_fund_text}
    Should Be Equal As Strings    ${text}    ${expec_manage_fund_text_TH}
check manage fund page is CN
    ${text}    Get Text    ${manage_fund_text}
    Should Be Equal As Strings    ${text}    ${expec_manage_fund_text_CN}      

check research project is TH
    ${text}    Get Text    ${research_project_text}
    Should Be Equal As Strings    ${text}    ${expec_research_project_text_TH}
check research project is CN
    ${text}    Get Text    ${research_project_text}
    Should Be Equal As Strings    ${text}    ${expec_research_project_text_CN}

check research group is TH
    ${text}    Get Text    ${research_group_text}
    Should Be Equal As Strings    ${text}    ${expec_research_group_text_TH}
check research group is CN
    ${text}    Get Text    ${research_group_text}
    Should Be Equal As Strings    ${text}    ${expec_research_group_text_CN}

check publication research is TH
    ${text}    Get Text    ${publication_research_text}
    Should Be Equal As Strings    ${text}    ${expec_publication_research_text_TH}

check publication research is CN
    ${text}    Get Text    ${publication_research_text}
    Should Be Equal As Strings    ${text}    ${expec_publication_research_text_CN}

check book is TH
    ${text}    Get Text    ${book_text}
    Should Be Equal As Strings    ${text}    ${expec_book_text_TH}

check book is CN
    ${text}    Get Text    ${book_text}
    Should Be Equal As Strings    ${text}    ${expec_book_text_CN}


check other academic works is TH
    ${text}    Get Text    ${other_academic_works_text}
    Should Be Equal As Strings    ${text}    ${expec_other_academic_works_text_TH}

check other academic works is CN
    ${text}    Get Text    ${other_academic_works_text}
    Should Be Equal As Strings    ${text}    ${expec_other_academic_works_text_CN}

check manage program is TH 
    ${text}    Get Text    ${manage_programs_text}
    Should Be Equal As Strings    ${text}    ${expec_manage_programs_text_TH}
check manage program is CN 
    ${text}    Get Text    ${manage_programs_text}
    Should Be Equal As Strings    ${text}    ${expec_manage_programs_text_CN}
check login title is TH
    ${text}    Get Text    ${login_title_text}
    Should Be Equal As Strings    ${text}    ${expec_login_title_TH}

check login title is CN
    ${text}    Get Text    ${login_title_text}
    Should Be Equal As Strings    ${text}    ${expec_login_title_CN}