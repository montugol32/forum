import styled from 'styled-components';

export const Wrapper = styled.div`
    display:flex;
    align-item:center;
    min-hight:100px;
    background:var(--darkGrey);
    padding: 0 20px;
`;

export const Content = styled.div`
    display:flex;
    max-width:var(--maxWidth);
    width:100%;
    margin:0 auto;

    .column{
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--medGrey);
        border-radius:20px;
        margin:0 20px;
        flex:1:
        
        :first-child{
            margin-left:0;
        }
        :last-child{
            margin-right:0;
        }
    }
    @margin screen and (max-width:786px){
        display:block;

        .colum{
            margin:20px 0;
        }
    }
`;